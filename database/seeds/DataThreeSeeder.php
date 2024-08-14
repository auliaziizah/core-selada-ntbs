<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class DataThreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'THREEDATA')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'THREE';
                $provider->code   = 'THREEDATA';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'TRD20')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Quota Xtra Three 20MB';
                $product->code   = 'TRD20';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TRD80')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Quota Xtra Three 80MB';
                $product->code   = 'TRD80';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'T5GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '1GB(24jam)+4GB(12malam-9Pagi) 1 HARI';
                $product->code   = 'T5GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TRD300')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Quota Xtra Three 300MB';
                $product->code   = 'TRD300';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'T2GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '750MB(ALL)+2GB(4G) 3 HARI';
                $product->code   = 'T2GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TMN1')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Mini 1gb REG2K 5HARI';
                $product->code   = 'TMN1';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TMN2')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Mini 1,5 gb REG2K 7HARI';
                $product->code   = 'TMN2';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDN1')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '1,5GB KUOTA REG+PULSA REG2K';
                $product->code   = 'TDN1';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TRD650')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Quota Xtra Three 650mb';
                $product->code   = 'TRD650';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TGM4')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'GetMore 4GB (2GB REG+2GB YOUTUBE)';
                $product->code   = 'TGM4';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'T3GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '3GB Smua Jaringan 3 HARI';
                $product->code   = 'T3GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDN2')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '2GB KUOTA REG+PULSA REG2K';
                $product->code   = 'TDN2';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDN3')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '3GB KUOTA REG+PULSA REG2K';
                $product->code   = 'TDN3';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TGM8')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'GetMore 8GB (4GB REG+4GB YOUTUBE)';
                $product->code   = 'TGM8';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TRD125')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Quota Xtra Three 1250MB';
                $product->code   = 'TRD125';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDN6')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '6GB KUOTA REG+PULSA REG 2K';
                $product->code   = 'TDN6';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TGM10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'GetMore 10GB (5GB REG+5GB YOUTUBE)';
                $product->code   = 'TGM10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'T10GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '2GB(ALL)+8GB(4G) 30 HARI';
                $product->code   = 'T10GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'T12GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '10GB 4G + 2GB ALL';
                $product->code   = 'T12GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDU6')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '6GB KUOTA UTAMA+PULSA REG 2K+UNLIMITED JAM 01-17';
                $product->code   = 'TDU6';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'TDU10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '10GB KUOTA UTAMA+PULSA REG 2K+UNLIMITED JAM 01-17';
                $product->code   = 'TDU10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'T24GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '4GB(ALL)+20GB(4G) 30 HARI';
                $product->code   = 'T24GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'T30GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '8GB(ALL)+22GB(4G) 30 HARI';
                $product->code   = 'T30GB';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'THREEDATA')->first();
        $product  = Product::where('code', 'TRD20')->first();
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
                $service->biller_price  = 2300;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TRD80')->first();
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
                $service->markup        = 900;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 5100;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'T5GB')->first();
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
                $service->biller_price  = 6000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TRD300')->first();
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
                $service->markup        = 650;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 9850;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'T2GB')->first();
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
                $service->markup        = 900;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 10100;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TMN1')->first();
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
                $service->biller_price  = 12000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TMN2')->first();
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
                $service->biller_price  = 16000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDN1')->first();
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
                $service->biller_price  = 16000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TRD650')->first();
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
                $service->markup        = 900;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 19600;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TGM4')->first();
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
                $service->biller_price  = 19700;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'T3GB')->first();
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
                $service->biller_price  = 20000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDN2')->first();
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
                $service->biller_price  = 20500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDN3')->first();
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
                $service->biller_price  = 27800;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TGM8')->first();
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
                $service->biller_price  = 31700;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TRD125')->first();
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
                $service->biller_price  = 32100;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDN6')->first();
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
                $service->markup        = 1350;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 35650;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TGM10')->first();
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
                $service->biller_price  = 37700;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'T10GB')->first();
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
                $service->biller_price  = 50000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'T12GB')->first();
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
                $service->biller_price  = 50000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDU6')->first();
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
                $service->biller_price  = 52500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'TDU10')->first();
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
                $service->biller_price  = 79000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'T24GB')->first();
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
                $service->biller_price  = 90000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'T30GB')->first();
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
                $service->biller_price  = 100000;
                $service->system_markup = 1000;
                $service->save();
        }
    }
}
