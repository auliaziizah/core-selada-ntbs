<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\BankRepository::class, \App\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProviderRepository::class, \App\Repositories\ProviderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ServiceRepository::class, \App\Repositories\ServiceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TransactionRepository::class, \App\Repositories\TransactionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TransactionStatusRepository::class, \App\Repositories\TransactionStatusRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TransactionPaymentStatusRepository::class, \App\Repositories\TransactionPaymentStatusRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BillerRepository::class, \App\Repositories\BillerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BillerDetailRepository::class, \App\Repositories\BillerDetailRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VersionRepository::class, \App\Repositories\VersionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TopupRepository::class, \App\Repositories\TopupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MerchantRepository::class, \App\Repositories\MerchantRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GroupRepository::class, \App\Repositories\GroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PrivilegeRepository::class, \App\Repositories\PrivilegeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RevenueRepository::class, \App\Repositories\RevenueRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserGroupRepository::class, \App\Repositories\UserGroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SchemaRepository::class, \App\Repositories\SchemaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GroupSchemaRepository::class, \App\Repositories\GroupSchemaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ShareholderRepository::class, \App\Repositories\ShareholderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GroupSchemaShareholderRepository::class, \App\Repositories\GroupSchemaShareholderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RolePrivilegeRepository::class, \App\Repositories\RolePrivilegeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserChildRepository::class, \App\Repositories\UserChildRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TerminalRepository::class, \App\Repositories\TerminalRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TransactionBJBRepository::class, \App\Repositories\TransactionBJBRepositoryEloquent::class);
        //:end-bindings:
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
