<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class PDAMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'PDAM')->first();
        $provider = Provider::where('code', 'PDAM')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'PDAM';
                $provider->code   = 'PDAM';
                $provider->status = 1;
                $provider->save();
        }

        $product = Product::where('code', 'PDAMBDG')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PDAM Kota Bandung';
                $product->code   = 'PDAMBDG';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PDAMKCB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PDAM Kab Cirebon';
                $product->code   = 'PDAMKCB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PDAMKBD')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PDAM Kab Bandung Barat';
                $product->code   = 'PDAMKBD';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PDAMKBG')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PDAM Kab Bogor';
                $product->code   = 'PDAMKBG';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PDAMSKB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PDAM Kota Sukabumi';
                $product->code   = 'PDAMSKB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PDAMCMS')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PDAM Kab Ciamis';
                $product->code   = 'PDAMCMS';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'PDAMGRT')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'PDAM Kab Garut';
                $product->code   = 'PDAMGRT';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'PDAM')->first();
        $provider = Provider::where('code', 'PDAM')->first();
        $product  = Product::where('code', 'PDAMBDG')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBAYARAN';
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 0;
                $service->system_markup = 0;
                $service->save();
        }
        $product  = Product::where('code', 'PDAMKCB')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBAYARAN';
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 0;
                $service->system_markup = 0;
                $service->save();
        }
        $product  = Product::where('code', 'PDAMKBD')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBAYARAN';
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 0;
                $service->system_markup = 0;
                $service->save();
        }
        $product  = Product::where('code', 'PDAMKBG')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBAYARAN';
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 0;
                $service->system_markup = 0;
                $service->save();
        }
        $product  = Product::where('code', 'PDAMSKB')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBAYARAN';
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 0;
                $service->system_markup = 0;
                $service->save();
        }
        $product  = Product::where('code', 'PDAMCMS')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBAYARAN';
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 0;
                $service->system_markup = 0;
                $service->save();
        }
        $product  = Product::where('code', 'PDAMGRT')->first();
        $service  = Service::where('category_id', $category->id)
                        ->where('provider_id', $provider->id)
                        ->where('product_id', $product->id)
                        ->first(); 
        if(!$service){ 
                $service = new Service;
                $service->category_id   = $category->id;
                $service->provider_id   = $provider->id;
                $service->product_id    = $product->id;
                $service->code          = 'PEMBAYARAN';
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 0;
                $service->system_markup = 0;
                $service->save();
        }
    }
}
