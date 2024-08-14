<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class GameFFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Voucher Game')->first();
        $provider = Provider::where('code', 'VCGFREE')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'Voucher Game Free Fire';
                $provider->code   = 'VCGFREE';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'FF50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '50 Diamond';
                $product->code   = 'FF50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'FF70')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '70 Diamond';
                $product->code   = 'FF70';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'FF140')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '140 Diamond';
                $product->code   = 'FF140';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'FF355')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '355 Diamond';
                $product->code   = 'FF355';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'FF720')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '720 Diamond';
                $product->code   = 'FF720';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'FF1450')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '1450 Diamond';
                $product->code   = 'FF1450';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'FF2180')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '2180 Diamond';
                $product->code   = 'FF2180';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'FF3640')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '3640 Diamond';
                $product->code   = 'FF3640';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Voucher Game')->first();
        $provider = Provider::where('code', 'VCGFREE')->first();
        $product  = Product::where('code', 'FF50')->first();
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
                $service->markup        = 1200;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 9000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'FF70')->first();
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
                $service->markup        = 1500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 11700;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'FF140')->first();
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
                $service->markup        = 1500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 22700;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'FF355')->first();
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
                $service->markup        = 1300;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 55900;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'FF720')->first();
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
                $service->markup        = 1400;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 111800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'FF1450')->first();
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
                $service->markup        = 1900;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 222300;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'FF2180')->first();
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
                $service->markup        = 1850;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 333300;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'FF3640')->first();
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
                $service->markup        = 1900;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 554300;
                $service->system_markup = 300;
                $service->save();
        }
    }
}
