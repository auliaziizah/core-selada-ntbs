<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class PLNPrabayarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'PLN Prabayar')->first();
        $provider = Provider::where('code', 'PLNPRA')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'PLN';
                $provider->code   = 'PLNPRA';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'PLA20')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PLN1600 20K';
                $product->code   = 'PLA20';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PLA50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PLN1600 50K';
                $product->code   = 'PLA50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PLA100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PLN1600 100K';
                $product->code   = 'PLA100';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PLA200')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PLN1600 200K';
                $product->code   = 'PLA200';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PLA201')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PLN1600 500K';
                $product->code   = 'PLA201';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PLA202')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PLN1600 1000K';
                $product->code   = 'PLA202';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'PLN Prabayar')->first();
        $provider = Provider::where('code', 'PLNPRA')->first();
        $product  = Product::where('code', 'PLA20')->first();
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
                $service->markup        = 2500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 20200;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'PLA50')->first();
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
                $service->markup        = 2500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 50200;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'PLA100')->first();
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
                $service->markup        = 2500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 100200;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'PLA200')->first();
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
                $service->markup        = 2500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 200200;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'PLA201')->first();
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
                $service->markup        = 2500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 500200;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'PLA202')->first();
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
                $service->markup        = 2500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 100200;
                $service->system_markup = 300;
                $service->save();
        }
    }
}
