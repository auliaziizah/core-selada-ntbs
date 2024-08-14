<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class EWalletLinkAjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'E-Wallet')->first();
        $provider = Provider::where('code', 'LINKAJA')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'Link Aja';
                $provider->code   = 'LINKAJA';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'LA10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 10k';
                $product->code   = 'LA10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA20')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 20k';
                $product->code   = 'LA20';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA25')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 25k';
                $product->code   = 'LA25';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA30')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 30k';
                $product->code   = 'LA30';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 50k';
                $product->code   = 'LA50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA75')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 75k';
                $product->code   = 'LA75';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 100k';
                $product->code   = 'LA100';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA150')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 100k';
                $product->code   = 'LA150';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA200')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 200k';
                $product->code   = 'LA200';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA300')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 300k';
                $product->code   = 'LA300';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'LA500')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'LINK AJA 500k';
                $product->code   = 'LA500';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'E-Wallet')->first();
        $provider = Provider::where('code', 'LINKAJA')->first();
        $product  = Product::where('code', 'LA10')->first();
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
                $service->biller_price  = 11000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA20')->first();
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
                $service->biller_price  = 21000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA25')->first();
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
                $service->biller_price  = 26000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA30')->first();
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
                $service->biller_price  = 31000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA50')->first();
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
                $service->biller_price  = 51000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA75')->first();
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
                $service->biller_price  = 76000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA100')->first();
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
                $service->biller_price  = 101000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA150')->first();
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
                $service->biller_price  = 151000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA200')->first();
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
                $service->biller_price  = 201000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA300')->first();
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
                $service->biller_price  = 301000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'LA500')->first();
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
                $service->biller_price  = 501000;
                $service->system_markup = 300;
                $service->save();
        }
    }
}
