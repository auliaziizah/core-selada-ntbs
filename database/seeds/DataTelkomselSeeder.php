<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class DataTelkomselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'TELKOMSELDATA')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'TELKOMSEL';
                $provider->code   = 'TELKOMSELDATA';
                $provider->status = 1;
                $provider->save();
        }

        $product = Product::where('code', 'MD5')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 20MB s/d 40MB (zona)';
                $product->code   = 'MD5';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD 10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 40MB s/d 110MB (zona)';
                $product->code   = 'MD 10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD20')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 200MB s/d 420MB (zona)';
                $product->code   = 'MD20';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD25')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 270MB s/d 750MB (zona)';
                $product->code   = 'MD25';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB1')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '1GB Flash + 2GB Game 24jam - 30hr';
                $product->code   = 'TDB1';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB2')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '2GB Flash + 2GB Video 24jam - 30hr';
                $product->code   = 'TDB2';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 800MB s/d 1.5GB (zona)';
                $product->code   = 'MD50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB3')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '3GB Flash + 1GB OMG! 24jam - 30hr';
                $product->code   = 'TDB3';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB4')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '4,5GB Flash + 2GB Video 24jam - 30hr';
                $product->code   = 'TDB4';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDBC6')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '4.5GB + 2GB OMG! 100Menit TSEL, 60 SMS TSEL 30hr';
                $product->code   = 'TDBC6';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB5')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '5GB Flash + 2GB OMG! 24jam - 30hr';
                $product->code   = 'TDB5';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 2.5GB s/d 4.5GB (zona)';
                $product->code   = 'MD100';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '10GB ALL +100 Menit Telpon + 100 SMS';
                $product->code   = 'TDB10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB8')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '8GB Flash + 2GB OMG! 24jam - 30hr';
                $product->code   = 'TDB8';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB12')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '12GB Flash + 2GB OMG! 24jam - 30hr';
                $product->code   = 'TDB12';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDBC17')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '17GB + 2GB OMG! 300Menit TSEL,100 SMS TSEL 30hr';
                $product->code   = 'TDBC17';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD150')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 4.5GB s/d 6.5GB (zona)';
                $product->code   = 'MD150';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDBC28')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '28GB + 2GB OMG! 30 HARI,600Menit TSEL,200 SMS TSEL';
                $product->code   = 'TDBC28';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB25')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '25GB Flash + 2GB OMG! 24jam - 30hr';
                $product->code   = 'TDB25';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD200')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 7GB s/d 9GB (zona)';
                $product->code   = 'MD200';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDB50')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '50GB Flash + 2GB OMG! 24jam - 30hr';
                $product->code   = 'TDB50';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'MD300')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'KUOTA 11GB s/d 14GB (zona)';
                $product->code   = 'MD300';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'TELKOMSELDATA')->first();
        $product  = Product::where('code', 'MD5')->first();
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
                $service->markup        = 825;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 5675;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD 10')->first();
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
                $service->markup        = 725;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 10275;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD20')->first();
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
                $service->biller_price  = 16700;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD25')->first();
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
                $service->biller_price  = 20200;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB1')->first();
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
                $service->biller_price  = 25000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB2')->first();
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
                $service->markup        = 1100;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 39900;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD50')->first();
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
                $service->biller_price  = 40000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB3')->first();
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
                $service->markup        = 1100;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 52900;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB4')->first();
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
                $service->markup        = 1430;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 72570;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDBC6')->first();
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
                $service->biller_price  = 77000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB5')->first();
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
                $service->biller_price  = 84000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD100')->first();
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
                $service->biller_price  = 90000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB10')->first();
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
                $service->biller_price  = 98000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB8')->first();
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
                $service->markup        = 2100;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 102900;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB12')->first();
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
                $service->biller_price  = 113500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDBC17')->first();
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
                $service->biller_price  = 129500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD150')->first();
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
                $service->biller_price  = 147500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDBC28')->first();
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
                $service->biller_price  = 177900;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB25')->first();
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
                $service->biller_price  = 193000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD200')->first();
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
                $service->biller_price  = 196500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDB50')->first();
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
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 235000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'MD300')->first();
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
                $service->markup        = 3000;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 296000;
                $service->system_markup = 1000;
                $service->save();
        }
    }
}
