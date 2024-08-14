<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class GameMLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Voucher Game')->first();
        $provider = Provider::where('code', 'VCGMOBILE')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'Voucher Game Mobile';
                $provider->code   = 'VCGMOBILE';
                $provider->status = 1;
                $provider->save();
        }

        $product = Product::where('code', 'ML15')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 15 Diamond';
                $product->code   = 'ML15';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML30')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 30 Diamond';
                $product->code   = 'ML30';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML33')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 33 Diamond';
                $product->code   = 'ML33';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML45')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 45 Diamond';
                $product->code   = 'ML45';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML60')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 60 Diamond';
                $product->code   = 'ML60';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML67')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 67 Diamond';
                $product->code   = 'ML67';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML74')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 74 Diamond';
                $product->code   = 'ML74';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML75')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 75 Diamond';
                $product->code   = 'ML75';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML167')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 167 Diamond';
                $product->code   = 'ML167';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML345')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 345 Diamond';
                $product->code   = 'ML345';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML1830')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 1830 Diamond';
                $product->code   = 'ML1830';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML2010')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 2010 Diamond';
                $product->code   = 'ML2010';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML3638')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 3638 Diamond';
                $product->code   = 'ML3638';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML4026')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 4026 Diamond';
                $product->code   = 'ML4026';
                $product->status = 1;
                $product->save();
        }
        $product = Product::where('code', 'ML4804')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = ' 4804 Diamond';
                $product->code   = 'ML4804';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Voucher Game')->first();
        $provider = Provider::where('code', 'VCGMOBILE')->first();
        $product  = Product::where('code', 'ML15')->first();
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
                $service->biller_price  = 5350;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML30')->first();
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
                $service->markup        = 950;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 9750;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML33')->first();
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
                $service->biller_price  = 10500;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML45')->first();
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
                $service->biller_price  = 14100;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML60')->first();
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
                $service->biller_price  = 18800;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML67')->first();
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
                $service->biller_price  = 20700;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML74')->first();
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
                $service->markup        = 1450;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 21250;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML75')->first();
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
                $service->markup        = 950;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 22750;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML167')->first();
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
                $service->biller_price  = 48700;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML345')->first();
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
                $service->biller_price  = 97200;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML1830')->first();
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
                $service->markup        = 2200;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 477500;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML2010')->first();
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
                $service->markup        = 2700;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 485000;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML3638')->first();
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
                $service->markup        = 2200;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 950500;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML4026')->first();
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
                $service->markup        = 2200;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 970500;
                $service->system_markup = 300;
                $service->save();
        }
        $product  = Product::where('code', 'ML4804')->first();
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
                $service->markup        = 2200;
                $service->biller_id     = $biller->id;
                $service->biller_code   = $biller->code;
                $service->biller_price  = 1185500;
                $service->system_markup = 300;
                $service->save();
        }
    }
}
