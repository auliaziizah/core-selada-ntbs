<?php

use Illuminate\Database\Seeder;

use App\Entities\Biller;
use App\Entities\BillerDetail;

class BillerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biller = Biller::where('code','SPI')->first();
        if(!$biller){
            $biller = new Biller;
            $biller->name       = 'PT. Super Pembayaran Indonesia';
            $biller->code       = 'SPI';
            $biller->address    = 'Ruko Marcedenia No. 39 Bumi Panyawangan Estate Kecamatan Cileunyi Kabupaten Bandung';
            $biller->phone      = '022-87881887';
            $biller->email      = '-';
            $biller->balance    = 0;
            $biller->pin        = 5832;
            $biller->username   = 'MTR1867';
            $biller->password   = 'test1234';
            $biller->save();
        }

        $billerDetail = BillerDetail::where('code','CEKSALDO')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'CEKSALDO';
            $billerDetail->description      = 'cek saldo efektif';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','PEMBELIAN')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'PEMBELIAN';
            $billerDetail->description      = 'transaksi pembelian PULSA,DATA,GAME';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','PEMBAYARAN')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'PEMBAYARAN';
            $billerDetail->description      = 'transaksi pembayaran tagihan seperti PLN,BPJS,PDAM,dll';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','INQPLNPRE')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'INQPLNPRE';
            $billerDetail->description      = 'cek data pelanggan PLN Token';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','INQPLNPSC')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'INQPLNPSC';
            $billerDetail->description      = 'cek nilai tagihan PLN';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','CEKSTATUS')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'CEKSTATUS';
            $billerDetail->description      = 'cek status transaksi sebelumnya';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','INQBPJSKS')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'INQBPJSKS';
            $billerDetail->description      = 'cek data pelanggan BPJS';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','INQTELKOM')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'INQTELKOM';
            $billerDetail->description      = 'cek nilai tagihan Telkom/Speedy';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','INQPDAM')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'INQPDAM';
            $billerDetail->description      = 'cek nilai tagihan PDAM';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }

        $billerDetail = BillerDetail::where('code','INQHALO')->first();
        if(!$billerDetail){
            $billerDetail = new BillerDetail;
            $billerDetail->biller_id        = $biller->id;
            $billerDetail->code             = 'INQHALO';
            $billerDetail->description      = 'cek tagihan kartu halo';
            $billerDetail->url              = 'https://host.kirimpesan.id/host2host/';
            $billerDetail->request_type     = 'POST';
            $billerDetail->save();
        }
    }
}
