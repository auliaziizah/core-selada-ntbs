<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class TelkomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Telkom')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'Telkom';
            $category->status = 1;
            $category->save();
        }

        $provider = Provider::where('code', 'TELKOMSPEEDY')->first();
        if(!$provider){
            $category = Category::where('name', 'Telkom')->first();

            $provider = new Provider;
            $provider->category_id  = $category->id;
            $provider->name   = 'Telkom/Speedy';
            $provider->code   = 'TELKOMSPEEDY';
            $provider->status = 1;
            $provider->save();
        }

        $product = Product::where('code', 'PAYTELKOM')->first();
        if(!$product){
            $provider = Provider::where('code', 'TELKOMSPEEDY')->first();
            $product = new Product;
            $product->provider_id  = $provider->id;
            $product->name   = 'Telkom/Speedy';
            $product->code   = 'PAYTELKOM';
            $product->status = 1;
            $product->save();
        }
        
        $service = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $provider->id)
                        ->first();
        if(!$service){
            $biller   = Biller::where('code','SPI')->first();
            if($biller){
                $service = new Service;
                $service->category_id = $category->id;
                $service->provider_id = $provider->id;
                $service->product_id  = $product->id;
                $service->code        = 'PEMBAYARAN';
                $service->markup      = 3000;
                $service->biller_id   = $biller->id;
                $service->biller_code = $biller->code;
                $service->biller_price= 0;
                $service->save();
            }
        }
    }
}
