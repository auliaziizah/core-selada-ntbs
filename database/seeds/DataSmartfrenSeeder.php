<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class DataSmartfrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'SMARTFRENDATA')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'SMARTFREN';
                $provider->code   = 'SMARTFRENDATA';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'SFD10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Kuota 24jam 1.25GB,kuota chat 1gb,kuota malam 1.75';
                $product->code   = 'SFD10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SFD20')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Kuota 24jam 2GB,kuota chat 1gb,kuota malam 2GB 14H';
                $product->code   = 'SFD20';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SFD30')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Kuota 24jam 5GB,kuota malam 5GB 30Hari';
                $product->code   = 'SFD30';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SFD40')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Kuota 24jam 8GB,kuota malam 8GB 30Hari';
                $product->code   = 'SFD40';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SMUDL')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SMART UNLIMITED Bulanan FUP 500MB/Day';
                $product->code   = 'SMUDL';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SFD60')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Kuota 24jam 15GB,kuota malam 15GB 30Hari';
                $product->code   = 'SFD60';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SMUNL')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SMART UNLIMITED Bulanan FUP 1GB/Day';
                $product->code   = 'SMUNL';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SFD100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Kuota 24jam 30GB,kuota malam 30GB 30Hari';
                $product->code   = 'SFD100';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'SMARTFRENDATA')->first();
        $product  = Product::where('code', 'SFD10')->first();
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
                $service->markup        = 1000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 10000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'SFD20')->first();
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
                $service->biller_price  = 19800;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'SFD30')->first();
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
                $service->markup        = 1000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 28500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'SFD40')->first();
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
                $service->markup        = 1000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 37000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'SMUDL')->first();
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
                $service->biller_price  = 47800;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'SFD60')->first();
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
                $service->markup        = 1000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 58000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'SMUNL')->first();
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
                $service->biller_price  = 70600;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'SFD100')->first();
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
                $service->markup        = 2000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 97000;
                $service->system_markup = 1000;
                $service->save();
        }
    }
}
