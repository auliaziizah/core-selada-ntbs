<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class EWalletShopeePaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'E-Wallet')->first();
        $provider = Provider::where('code', 'SHOPEEPAY')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'Shopeepay';
                $provider->code   = 'SHOPEEPAY';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'SHOPEE10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 10K';
                $product->code   = 'SHOPEE10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE20')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 20K';
                $product->code   = 'SHOPEE20';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE30')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 30K';
                $product->code   = 'SHOPEE30';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 50K';
                $product->code   = 'SHOPEE50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE70')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 70K';
                $product->code   = 'SHOPEE70';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 100K';
                $product->code   = 'SHOPEE100';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE200')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 200K';
                $product->code   = 'SHOPEE200';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE300')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 300K';
                $product->code   = 'SHOPEE300';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE400')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 400K';
                $product->code   = 'SHOPEE400';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'SHOPEE500')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'SHOPEEPAY 500K';
                $product->code   = 'SHOPEE500';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'E-Wallet')->first();
        $provider = Provider::where('code', 'SHOPEEPAY')->first();
        $product  = Product::where('code', 'SHOPEE10')->first();
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
                $service->biller_price  = 10800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE20')->first();
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
                $service->biller_price  = 20800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE30')->first();
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
                $service->biller_price  = 30800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE50')->first();
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
                $service->biller_price  = 50800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE70')->first();
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
                $service->biller_price  = 70800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE100')->first();
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
                $service->biller_price  = 100800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE200')->first();
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
                $service->biller_price  = 200800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE300')->first();
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
                $service->biller_price  = 300800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE400')->first();
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
                $service->biller_price  = 400800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'SHOPEE500')->first();
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
                $service->biller_price  = 500800;
                $service->system_markup = 300;
                $service->save();
        }
    }
}
