<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\Category;
use App\Entities\Provider;
use App\Entities\Product;
use App\Entities\Service;

class BPJSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'BPJS Kesehatan')->first();
        $provider = Provider::where('code', 'BPJS')->first(); 
        if(!$provider){ 
                $provider = new Provider;
                $provider->category_id  = $category->id;
                $provider->name   = 'BPJS Kesehatan';
                $provider->code   = 'BPJS';
                $provider->status = 1;
                $provider->save();
        }

        $product = Product::where('code', 'PAYBPJS')->first();
        if(!$product){ 
                $product = new Product;
                $product->provider_id  = $provider->id;
                $product->name   = 'BPJS Kesehatan';
                $product->code   = 'PAYBPJS';
                $product->status = 1;
                $product->save();
        }

        // ==================== SERVICE ======================== //
        $biller   = Biller::where('code','SPI')->first();
        $category = Category::where('name', 'BPJS Kesehatan')->first();
        $provider = Provider::where('code', 'BPJS')->first();
        $product  = Product::where('code', 'PAYBPJS')->first();
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
