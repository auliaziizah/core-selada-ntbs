<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

use App\Entities\Revenue;
use App\Entities\Transaction;
use App\Entities\Merchant;
use App\Entities\Group;
use App\Entities\GroupSchema;
use App\Entities\GroupSchemaShareholder;
use App\Entities\UserGroup;
use App\Entities\UserChild;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $credentials = $request->only('group_id', 'date', 'schema_id');
        $rules = [
            'group_id'  => 'required',
            'schema_id' => 'required',
            'date'      => 'required',
        ];
        
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['status'=> false, 'error'=> $validator->messages()],403);
        }

        $getInfo    = $this->getInfo($request)->original;
        $merchants  = $this->calcRevenue($request->group_id, $request->date, $request->schema_id);
        $merchants  = collect($merchants);
        $sorted     = $merchants->sortByDesc('id')->values()->all();
        
        $data            = (object) $getInfo;
        $data->merchants = $sorted;

        $response = [   
            'status'    => true, 
            'message'   => 'Success',
            'data'      => $data,
        ];

        return response()->json($response, 200);
    }

    public function getMerchant(Request $request)
    {
        $credentials = $request->only('group_id');
        $rules = [
            'group_id'  => 'required'
        ];
        
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['status'=> false, 'error'=> $validator->messages()],403);
        }

        $data  = $this->calcMerchant($request->group_id);
        $data  = collect($data);


        $response = [   
            'status'    => true, 
            'message'   => 'Success',
            'data'      => $data,
        ];

        return response()->json($response, 200);
    }

    public function getRevenue(Request $request)
    {
        $credentials = $request->only('group_id', 'date', 'schema_id');
        $rules = [
            'group_id'  => 'required',
            'schema_id' => 'required',
            'date'      => 'required',
        ];
        
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['status'=> false, 'error'=> $validator->messages()],403);
        }

        $group = Group::where('parent_id', $request->group_id)->first();
        if($group){
            $groupSchema = GroupSchema::where('group_id', $request->group_id)
                                        ->where('schema_id', $request->schema_id)
                                        ->first();
            
            $data  = $this->calcRevenue($request->group_id, $request->date, $request->schema_id);
            $amount = 0;
            foreach($data as $item){
                $amount = $amount + $item->amount;
            }

            $revenue = $amount * $groupSchema->share/100;

            // Check if this group is shareable
            if($groupSchema->is_shareable ==  true){
                $shareholders = GroupSchemaShareholder::where('group_schema_id', $groupSchema->id)
                                                    ->with('shareholder')
                                                    ->get();
                foreach($shareholders as $sh){
                    $sh->revenue = $sh->share/100 * $revenue;
                }
            }else{
                $shareholders = [];
            }
        }

        $response = [   
            'status'        => true, 
            'message'       => 'Success',
            'share'         => $groupSchema->share,
            'revenue'       => $revenue,
            'shareholder'   => $shareholders,
            'data'          => $data,
        ];

        return response()->json($response, 200);
    }

    private function getInfo(Request $request)
    {
        DB::beginTransaction();
        try {
            $date           = $request->date;
            $group_id       = $request->group_id;
            $schema_id      = $request->schema_id;
            $amount         = $this->calculate($group_id, $date);
            $totalTrx       = $this->countTrx($group_id, $date);
            $amountTrx      = $this->calcTrx($group_id, $date);
            $totalMerchant  = count($this->calcMerchant($group_id));
            
            // Check 
            $groupSchema = GroupSchema::where('group_id', $group_id)
                                        ->where('schema_id', $schema_id)
                                        ->first();
            if($groupSchema){
                $revenue = $amount * $groupSchema->share/100;

                // Check if this group is shareable
                if($groupSchema->is_shareable ==  true){
                    $shareholders = GroupSchemaShareholder::where('group_schema_id', $groupSchema->id)
                                                        ->with('shareholder')
                                                        ->get();
                    foreach($shareholders as $sh){
                        $sh->revenue = $sh->share/100 * $revenue;
                    }
                }else{
                    $shareholders = [];
                }

                $response = [
                    'revenue'       => $revenue,
                    'total_trx'     => $totalTrx,
                    'amount_trx'    => $amountTrx,
                    'total_merchant'=> $totalMerchant,
                    'shareholder'   => $shareholders
                ];
            }else{
                return response()->json([
                    'status'    => false, 
                    'error'     => 'Group has not schema'
                ], 404);
            }

            DB::commit();
            return response()->json($response, 200);
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        }
    }

    private function calculate($group_id, $date)
    {
        $groups = Group::where('parent_id', $group_id)->get();
        $result = 0;
        foreach ($groups as $item){
            // Check if id is leaf or not
            $check = Group::where('parent_id', $item->id)->first();
            if($check){
                $result = $this->calculate($item->id, $date);
            }else{
                // Count amount of transactions
                $userGroups = UserGroup::where('group_id', $item->id)->get();
                foreach($userGroups as $userGroup){
                    $merchant = Merchant::where('user_id', $userGroup->user_id)->first();
                    if($merchant){
                        $revenue = Revenue::where('merchant_id', $merchant->id)
                                        ->whereDate('date', $date)
                                        ->first();

                        if($revenue){
                            $result = $result + $revenue->amount;
                        }
                    }
                }
            }
        }
        return $result;
    }

    private function countTrx($group_id, $date)
    {
        $groups = Group::where('parent_id', $group_id)->get();
        $result = 0;
        
        foreach ($groups as $item){
            // Check if id is leaf or not
            $check = Group::where('parent_id', $item->id)->first();
            if($check){
                $result = $this->countTrx($item->id, $date);
            }else{
                // Count amount of transactions
                $userGroups = UserGroup::where('group_id', $item->id)->get();
                foreach($userGroups as $userGroup){
                    $merchant = Merchant::where('user_id', $userGroup->user_id)->first();
                    if($merchant){
                        $count = Transaction::where('merchant_id', $merchant->id)->count();
                        $result = $result + $count;
                    }
                }
            }
        }
        return $result;
    }

    private function calcTrx($group_id, $date)
    {
        $groups = Group::where('parent_id', $group_id)->get();
        $result = 0;
        
        foreach ($groups as $item){
            // Check if id is leaf or not
            $check = Group::where('parent_id', $item->id)->first();
            if($check){
                $result = $this->calcTrx($item->id, $date);
            }else{
                // sum amount of transactions
                $userGroups = UserGroup::where('group_id', $item->id)->get();
                foreach($userGroups as $userGroup){
                    $merchant = Merchant::where('user_id', $userGroup->user_id)->first();
                    if($merchant){
                        $sum = Transaction::where('merchant_id', $merchant->id)->sum('price');
                        $result = $result + $sum;
                    }
                }
            }
        }
        return $result;
    }

    private function calcMerchant($group_id)
    {
        $groups = Group::where('parent_id', $group_id)->get();
        $result = [];
        foreach ($groups as $item){
            // Check if id is leaf or not
            $check = Group::where('parent_id', $item->id)->first();
            if($check){
                $result = $this->calcMerchant($item->id);
            }else{
                // Count amount of transactions
                $userGroups = UserGroup::where('group_id', $item->id)->get();
                foreach($userGroups as $userGroup){
                    $data = Merchant::where('user_id', $userGroup->user_id)->first();
                    if($data){
                        array_push($result, $data);
                    }
                }
            }
        }
        return $result;
    }

    private function calcRevenue($group_id, $date, $schema_id)
    {
        $groups = Group::where('parent_id', $group_id)->get();
        $result = [];
        foreach ($groups as $item){
            // Check if id is leaf or not
            
            $check = Group::where('parent_id', $item->id)->first();
            if($check){
                $result = $this->calcRevenue($item->id, $date, $schema_id);
            }else{
                // Get share 
                $groupSchema = GroupSchema::where('group_id', $item->id)
                                            ->where('schema_id', $schema_id)
                                            ->first();
                if($groupSchema){
                    $share = $groupSchema->share;
                }else{
                    $share = 0;
                }
                // Count amount of transactions
                $userGroups = UserGroup::where('group_id', $item->id)->get();
                foreach($userGroups as $userGroup){
                    $merchant = Merchant::where('user_id', $userGroup->user_id)->first();
                    if($merchant){
                        $data = Revenue::where('merchant_id', $merchant->id)
                                        ->whereDate('date', $date)
                                        ->first();

                        if($data){
                            $data->profit = $data->amount * $share / 100;
                            $data->share = $share;
                            array_push($result, $data);
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function listRevenue(Request $request)
    {

        $userGroup = UserGroup::where('user_id', $request->user_id)->first();
            if($userGroup){
            // Schema
            $groupSchema = GroupSchema::where('group_id', $userGroup->group_id)
                                        ->where('schema_id', $request->schema_id)
                                        ->first();
            if($groupSchema){
                $share = $groupSchema->share;
            }else{
                $share = 0;
            }
        }else{
            return response()->json('User Group not found', 404);
        }

        $check = UserChild::where('user_id', $request->user_id)->with('user','child')->first();
        
        if(!$check){
            
        }else{
            $userChilds = UserChild::where('user_id', $request->user_id)->with('user','child')->get();
            $result = new \stdClass();
            foreach ($userChilds as $uc){
                $result->{$uc->user->fullname} = $this->calcChild($uc->child_id, $request->date, $request->schema_id);
            }
                // End Schema
                foreach($result as $res){
                    $res[0]->real_profit = $res[0]->amount * $share/100;
                }

                return response()->json([
                    'status'    => true, 
                    'data'      => $result
                ], 200);
            
        }
    }

    private function calcChild($user_id, $date, $schema_id)
    {
        $userChilds = UserChild::where('user_id', $user_id)->with('user','child')->get();
        $result = [];
        foreach ($userChilds as $uc){
            // Check if id is leaf or not
            $check = UserChild::where('user_id', $uc->child_id)->with('user','child')->first();
            if($check){
                $result = $this->calcChild($uc->child_id, $date, $schema_id);
            }else{
                $userGroup = UserGroup::where('user_id', $uc->child_id)->first();
                if($userGroup){
                    // Get share
                    $group_id    = $userGroup->group_id;
                    $groupSchema = GroupSchema::where('group_id', $group_id)
                                                ->where('schema_id', $schema_id)
                                                ->first();
                    if($groupSchema){
                        $share = $groupSchema->share;
                    }else{
                        $share = 0;
                    }
                    // Count amount of transactions
                    $userGroups = UserGroup::where('group_id', $group_id)->get();
                    foreach($userGroups as $userGroup){
                        $merchant = Merchant::where('user_id', $userGroup->user_id)->first();
                        if($merchant){
                            $data = Revenue::where('merchant_id', $merchant->id)
                                        ->whereDate('date', $date)
                                        ->first();

                            if($data){
                                $data->profit = $data->amount * $share / 100;
                                $data->share = $share;
                                array_push($result, $data);
                            }
                        }
                    }
                }
            }
        }
        return $result;
    }
}
