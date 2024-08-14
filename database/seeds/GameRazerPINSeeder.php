<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class GameRazerPINSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Voucher Game')->first();
        $provider = Provider::where('code', 'VCGRAZER')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'Voucher Game Razer Pin';
                $provider->code   = 'VCGRAZER';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'MOLV11')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Razer PIN 10.000';
                $product->code   = 'MOLV11';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MOLV22')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Razer PIN 20.000';
                $product->code   = 'MOLV22';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MOLV55')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Razer PIN 50.000';
                $product->code   = 'MOLV55';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MOLV110')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Razer PIN 100.000';
                $product->code   = 'MOLV110';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MOLV220')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Razer PIN 200.000';
                $product->code   = 'MOLV220';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MOLV550')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Razer PIN 500.000';
                $product->code   = 'MOLV550';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MOLV1000')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Razer PIN 1.000.000';
                $product->code   = 'MOLV1000';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Voucher Game')->first();
        $provider = Provider::where('code', 'VCGRAZER')->first();
        $product  = Product::where('code', 'MOLV11')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBELIAN';
                $service->markup        = 1950;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 10750;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'MOLV22')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBELIAN';
                $service->markup        = 1700;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 20000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'MOLV55')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBELIAN';
                $service->markup        = 1950;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 47750;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'MOLV110')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBELIAN';
                $service->markup        = 700;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 94000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'MOLV220')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBELIAN';
                $service->markup        = 1700;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 186000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'MOLV550')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBELIAN';
                $service->markup        = 2200;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 463000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'MOLV1000')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBELIAN';
                $service->markup        = 2700;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 926000;
                $service->system_markup = 300;
                $service->save();
        }
    }
}
