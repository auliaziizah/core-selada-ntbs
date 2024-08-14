<?php

use Illuminate\Database\Seeder;

use App\Entities\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name','Pulsa')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'Pulsa';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','Pulsa Data')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'Pulsa Data';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','PLN Prabayar')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'PLN Prabayar';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','PLN Pascabayar')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'PLN Pascabayar';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','BPJS Kesehatan')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'BPJS Kesehatan';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','Telkom')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'Telkom';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','PDAM')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'PDAM';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','Voucher Game')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'Voucher Game';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','E-Wallet')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'E-Wallet';
            $category->status = 1;
            $category->save();
        }

        $category = Category::where('name','Pulsa Pasca')->first();
        if(!$category){
            $category = new Category;
            $category->name   = 'Pulsa Pasca';
            $category->status = 1;
            $category->save();
        }
    }
}
