<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class DataXLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'XLDATA')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'XL';
                $provider->code   = 'XLDATA';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'XIH30')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'HotRod 24 Jam 800 MB/30 hari';
                $product->code   = 'XIH30';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XIH50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'HotRod 24 Jam 1,5GB/30 hari';
                $product->code   = 'XIH50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XDC50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '5GB 2G/3G/4G + 5GB Youtube+Free 20mnt allopr';
                $product->code   = 'XDC50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XIH60')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'HotRod 24 Jam 3GB/30 hari';
                $product->code   = 'XIH60';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XDC90')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '10GB 2G/3G/4G + 10GB Youtube+Free 30mnt allopr';
                $product->code   = 'XDC90';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XIH100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'HotRod 24 Jam 6GB/30 hari';
                $product->code   = 'XIH100';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XDC130')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '15GB 2G/3G/4G + 15GB Youtube+Free 40mnt allopr';
                $product->code   = 'XDC130';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XIH130')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'HotRod 24 Jam 8GB/30 hari';
                $product->code   = 'XIH130';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XDC180')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '20GB 2G/3G/4G + 20GB Youtube+Free 60mnt allopr';
                $product->code   = 'XDC180';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XIH180')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'HotRod 24 Jam 12GB/30 hari';
                $product->code   = 'XIH180';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XIH220')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'HotRod 24 Jam 16GB/30 hari';
                $product->code   = 'XIH220';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XDC240')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '35GB 2G/3G/4G + 35GB Youtube+Free 90mnt allopr';
                $product->code   = 'XDC240';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'XLDATA')->first();
        $product  = Product::where('code', 'XIH30')->first();
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
                $service->markup        = 800;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 29200;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XIH50')->first();
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
                $service->markup        = 1275;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 45725;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XDC50')->first();
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
                $service->markup        = 1410;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 54090;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XIH60')->first();
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
                $service->markup        = 1370;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 55130;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XDC90')->first();
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
                $service->biller_price  = 80800;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XIH100')->first();
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
                $service->biller_price  = 91550;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XDC130')->first();
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
                $service->markup        = 1975;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 112525;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XIH130')->first();
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
                $service->markup        = 2235;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 113765;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XDC180')->first();
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
                $service->markup        = 2210;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 160790;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XIH180')->first();
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
                $service->markup        = 2600;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 171400;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XIH220')->first();
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
                $service->markup        = 2590;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 198910;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XDC240')->first();
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
                $service->markup        = 3020;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 215980;
                $service->system_markup = 1000;
                $service->save();
        }
    }
}
