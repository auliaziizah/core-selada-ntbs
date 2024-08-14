<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BillerSeeder::class);
        $this->call(CategoriesSeeder::class);

        // Pulsa
        $this->call(PulsaAxisSeeder::class);
        $this->call(PulsaIndosatSeeder::class);
        $this->call(PulsaSmartfrenSeeder::class);
        $this->call(PulsaTelkomselPromoSeeder::class);
        $this->call(PulsaTelkomselSeeder::class);
        $this->call(PulsaThreeSeeder::class);
        $this->call(PulsaXLAltSeeder::class);
        $this->call(PulsaXLPromoSeeder::class);
        $this->call(PulsaXLRegSeeder::class);

        // Data
        $this->call(DataAxisSeeder::class);
        $this->call(DataIndosatSeeder::class);
        $this->call(DataSmartfrenSeeder::class);
        $this->call(DataTelkomselSeeder::class);
        $this->call(DataThreeSeeder::class);

        $this->call(BPJSSeeder::class);
        $this->call(PDAMSeeder::class);
        $this->call(PLNPascabayarSeeder::class);
        $this->call(PLNPrabayarSeeder::class);
        $this->call(TelkomSeeder::class);

        // E-Wallet
        $this->call(EWalletDanaSeeder::class);
        $this->call(EWalletGOPayCustSeeder::class);
        $this->call(EWalletGOPayDriverSeeder::class);
        $this->call(EWalletLinkAjaSeeder::class);
        $this->call(EWalletOVOSeeder::class);
        $this->call(EWalletShopeePaySeeder::class);

        // Voc Game
        $this->call(GameFFSeeder::class);
        $this->call(GameGarenaSeeder::class);
        $this->call(GameGemscoolSeeder::class);
        $this->call(GameLytoSeeder::class);
        $this->call(GameMegaxusSeeder::class);
        $this->call(GameMLSeeder::class);
        $this->call(GamePBSeeder::class);
        $this->call(GamePUBGSeeder::class);
        $this->call(GameRazerPINSeeder::class);
        $this->call(GameSteamSeeder::class);
        $this->call(GameWavepointSeeder::class);
        
        // Pulsa Pasca
        $this->call(PascaHaloSeeder::class);
        
    }
}
