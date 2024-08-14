<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class PascaHaloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Pulsa Pasca')->first();
        $provider = Provider::where('code', 'TELKOMSEL')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'TELKOMSEL';
                $provider->code   = 'TELKOMSELPASCA';
                $provider->status = 1;
                $provider->save();
        }

        $product = Product::where('code', 'PAYHALO')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'TSEL HALO PASCABAYAR';
                $product->code   = 'PAYHALO';
                $product->status = 1;
                $product->save();
        }
        
        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'Pulsa Pasca')->first();
        $provider = Provider::where('code', 'TELKOMSELPASCA')->first();
        $product  = Product::where('code', 'PAYHALO')->first();
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
