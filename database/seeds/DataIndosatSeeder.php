<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class DataIndosatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'INDOSATDATA')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'INDOSAT';
                $provider->code   = 'INDOSATDATA';
                $provider->status = 1;
                $provider->save();
        }
        
        $product = Product::where('code', 'IM1GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'iSAT MINI 1gb(all)1gb(01-06)500mb(app)';
                $product->code   = 'IM1GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ID1')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Unlimited apps+1GB 30hr';
                $product->code   = 'ID1';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IM2GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'iSAT MINI 2gb(all)3.5gb(01-06)500mb(app)';
                $product->code   = 'IM2GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XID2')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Indosat Data Extra 2GB';
                $product->code   = 'XID2';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ID2')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Unlimited apps+2GB 30hr';
                $product->code   = 'ID2';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XID4')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Indosat Data Extra 4GB';
                $product->code   = 'XID4';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ID3')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Unlimited apps+3GB 30hr';
                $product->code   = 'ID3';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IFD1GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '2GB+3GB(4G)+5GB Quoata Malam+2GB Stream ON';
                $product->code   = 'IFD1GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IM4GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'iSAT MINI 4gb(all)20gb(01-06)4GB(app)';
                $product->code   = 'IM4GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'XID6')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Indosat Data Extra 6GB';
                $product->code   = 'XID6';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ID7')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Unlimited apps+7GB 30hr';
                $product->code   = 'ID7';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IFD3GB')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = '4GB+8GB(4G)+10GB Quoata Malam+4GB Stream ON';
                $product->code   = 'IFD3GB';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ID10')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Unlimited apps+10GB 30hr';
                $product->code   = 'ID10';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ID15')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Unlimited apps+15GB 30hr';
                $product->code   = 'ID15';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IDJUM')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'Unlimited Jumbo (30 hari)';
                $product->code   = 'IDJUM';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD100')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 100MB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD100';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD200')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 200MB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD200';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD250')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 250MB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD250';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD300')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 300MB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD300';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD500')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 500MB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD500';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD1')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 1GB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD1';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD2')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 2GB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD2';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD3')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 3GB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD3';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'IGD5')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'ISAT DATA 5GB, ALL BAND, 24 JAM, 30HR';
                $product->code   = 'IGD5';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Pulsa Data')->first();
        $provider = Provider::where('code', 'INDOSATDATA')->first();
        $product  = Product::where('code', 'IM1GB')->first();
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
                $service->markup        = 1050;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 19950;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'ID1')->first();
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
                $service->markup        = 1100.;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 23900;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IM2GB')->first();
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
                $service->markup        = 1050.;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 34950;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XID2')->first();
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
                $service->markup        = 1150.;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 36350;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'ID2')->first();
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
                $service->markup        = 1125;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 37875;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XID4')->first();
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
                $service->markup        = 1150.;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 52350;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'ID3')->first();
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
                $service->markup        = 1050.;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 56950;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IFD1GB')->first();
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
                $service->markup        = 1400.;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 55600;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IM4GB')->first();
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
                $service->biller_price  = 62500;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'XID6')->first();
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
                $service->markup        = 1650;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 70350;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'ID7')->first();
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
                $service->biller_price  = 76100;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IFD3GB')->first();
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
                $service->biller_price  = 83600;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'ID10')->first();
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
                $service->markup        = 2250;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 95750;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'ID15')->first();
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
                $service->biller_price  = 126000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IDJUM')->first();
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
                $service->markup        = 3600;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 149400;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD100')->first();
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
                $service->markup        = 500;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 2000;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD200')->first();
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
                $service->markup        = 350;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 4150;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD250')->first();
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
                $service->biller_price  = 4300;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD300')->first();
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
                $service->biller_price  = 4700;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD500')->first();
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
                $service->biller_price  = 8025;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD1')->first();
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
        $product  = Product::where('code', 'IGD2')->first();
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
                $service->biller_price  = 25100;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD3')->first();
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
                $service->biller_price  = 37600;
                $service->system_markup = 1000;
                $service->save();
        }
        $product  = Product::where('code', 'IGD5')->first();
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
                $service->biller_price  = 60600;
                $service->system_markup = 1000;
                $service->save();
        }
    }
}
