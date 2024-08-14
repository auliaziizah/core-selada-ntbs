<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class EWalletGOPayDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'E-Wallet')->first();
        $provider = Provider::where('code', 'GOPAYD')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'Go-Pay';
                $provider->code   = 'GOPAYD';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'GPD50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 50K';
                $product->code   = 'GPD50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'GPD75')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 75K';
                $product->code   = 'GPD75';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'GPD100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 100K';
                $product->code   = 'GPD100';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'GPD150')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 150K';
                $product->code   = 'GPD150';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'GPD200')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 200K';
                $product->code   = 'GPD200';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'GPD300')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 300K';
                $product->code   = 'GPD300';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'GPD500')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 500K';
                $product->code   = 'GPD500';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'GPD1000')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Go-Pay Driver 1000K';
                $product->code   = 'GPD1000';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'E-Wallet')->first();
        $provider = Provider::where('code', 'GOPAYD')->first();
        $product  = Product::where('code', 'GPD50')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 51225;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'GPD75')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 76225;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'GPD100')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 101225;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'GPD150')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 151225;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'GPD200')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 201225;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'GPD300')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 301225;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'GPD500')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 501225;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'GPD1000')->first();
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
                $service->markup        = 975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 1001225;
                $service->system_markup = 300;
                $service->save();
        }
    }
}
