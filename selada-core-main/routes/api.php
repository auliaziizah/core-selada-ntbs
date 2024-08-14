<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/', function (Request $request) {
//    return 'Version 1.0.0';
//});
// Route::get('services', 'ServicesController@index')->middleware(['csrfvalidate']);

Route::get('transactions/detail/{id}', 'TransactionsController@showWeb');
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
 Route::get('transactions/updateStatus', 'TransactionsController@updateStatus');
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::post('auth/changePassword', 'AuthController@changePassword');
    Route::post('auth/logout', 'AuthController@logout');

//Route::get('transactions/detail/{id}', 'TransactionsController@showWeb');

//    Route::get('banks', 'BanksController@index');
//    Route::post('banks', 'BanksController@store');
//    Route::get('banks/{id}', 'BanksController@show');
//    Route::post('banks/{id}', 'BanksController@update');
//    Route::delete('banks/{id}', 'BanksController@destroy');

//    Route::get('billers', 'BillersController@index');
//    Route::post('billers', 'BillersController@store');
//    Route::get('billers/{id}', 'BillersController@show');
//    Route::post('billers/{id}', 'BillersController@update');
//    Route::delete('billers/{id}', 'BillersController@destroy');

//    Route::get('billerDetails', 'BillerDetailsController@index');
//    Route::post('billerDetails', 'BillerDetailsController@store');
//    Route::get('billerDetails/{id}', 'BillerDetailsController@show');
//    Route::post('billerDetails/{id}', 'BillerDetailsController@update');
//    Route::delete('billerDetails/{id}', 'BillerDetailsController@destroy');

    Route::get('categories', 'CategoriesController@index');
//    Route::post('categories', 'CategoriesController@store');
    Route::get('categories/{id}', 'CategoriesController@show');
//    Route::post('categories/{id}', 'CategoriesController@update');
//    Route::delete('categories/{id}', 'CategoriesController@destroy');

//    Route::post('core/checkBalance', 'CoresController@checkBalance');
//    Route::post('core/checkStatus', 'CoresController@checkStatus');
    Route::post('core/checkPLNPostpaid', 'CoresController@checkPLNPostpaid');

//    Route::post('dashboard','DashboardController@dashboard');
//    Route::post('dashboard/getMerchant','DashboardController@getMerchant');
//    Route::post('dashboard/getRevenue','DashboardController@getRevenue');
//    Route::post('dashboard/listRevenue','DashboardController@listRevenue');

//    Route::get('groups', 'GroupsController@index');
//    Route::post('groups', 'GroupsController@store');
//    Route::get('groups/{id}', 'GroupsController@show');
//    Route::post('groups/{id}', 'GroupsController@update');
//    Route::delete('groups/{id}', 'GroupsController@destroy');

//    Route::get('groupSchemaShareholders', 'GroupSchemaShareholdersController@index');
//    Route::post('groupSchemaShareholders', 'GroupSchemaShareholdersController@store');
//    Route::post('groupSchemaShareholders/{id}', 'GroupSchemaShareholdersController@update');
//    Route::delete('groupSchemaShareholders/{id}', 'GroupSchemaShareholdersController@destroy');

//    Route::get('groupSchemas', 'GroupSchemasController@index');
//    Route::post('groupSchemas', 'GroupSchemasController@store');
//    Route::post('groupSchemas/{id}', 'GroupSchemasController@update');
//    Route::delete('groupSchemas/{id}', 'GroupSchemasController@destroy');

//    Route::get('merchants', 'MerchantsController@index');
//    Route::post('merchants', 'MerchantsController@store');
    Route::get('merchants/getMerchant', 'MerchantsController@getMerchant');
//    Route::post('merchants/updateBalance', 'MerchantsController@updateBalance');
//    Route::get('merchants/lastestNumber', 'MerchantsController@lastestNumber');
//    Route::get('merchants/{id}', 'MerchantsController@show');
//    Route::post('merchants/{id}', 'MerchantsController@update');
//    Route::delete('merchants/{id}', 'MerchantsController@destroy');

//    Route::get('privileges', 'PrivilegesController@index');
//    Route::post('privileges', 'PrivilegesController@store');
//    Route::get('privileges/{id}', 'PrivilegesController@show');
//    Route::post('privileges/{id}', 'PrivilegesController@update');
//    Route::delete('privileges/{id}', 'PrivilegesController@destroy');

    Route::get('providers', 'ProvidersController@index');
//    Route::post('providers', 'ProvidersController@store');
    Route::get('providers/{id}', 'ProvidersController@show');
//    Route::post('providers/{id}', 'ProvidersController@update');
//    Route::delete('providers/{id}', 'ProvidersController@destroy');

    Route::get('products', 'ProductsController@index');
//    Route::post('products', 'ProductsController@store');
    Route::get('products/{id}', 'ProductsController@show');
//    Route::post('products/{id}', 'ProductsController@update');
//    Route::delete('products/{id}', 'ProductsController@destroy');

//    Route::get('revenues', 'RevenuesController@index');
//    Route::post('revenues', 'RevenuesController@store');
//    Route::get('revenues/getRevenue', 'RevenuesController@getRevenue');
//    Route::get('revenues/{id}', 'RevenuesController@show');
//    Route::post('revenues/{id}', 'RevenuesController@update');
//    Route::delete('revenues/{id}', 'RevenuesController@destroy');

//    Route::get('roles', 'RolesController@index');
//    Route::post('roles', 'RolesController@store');
//    Route::get('roles/{id}', 'RolesController@show');
//    Route::post('roles/{id}', 'RolesController@update');
//    Route::delete('roles/{id}', 'RolesController@destroy');

//    Route::get('rolePrivileges', 'RolePrivilegesController@index');
//    Route::post('rolePrivileges', 'RolePrivilegesController@store');
//    Route::get('rolePrivileges/{id}', 'RolePrivilegesController@show');
//    Route::post('rolePrivileges/{id}', 'RolePrivilegesController@update');
//    Route::delete('rolePrivileges/{id}', 'RolePrivilegesController@destroy');

//    Route::get('schemas', 'SchemasController@index');
//    Route::post('schemas', 'SchemasController@store');
//    Route::get('schemas/{id}', 'SchemasController@show');
//    Route::post('schemas/{id}', 'SchemasController@update');
//    Route::delete('schemas/{id}', 'SchemasController@destroy');

    Route::get('services', 'ServicesController@index');
//    Route::post('services', 'ServicesController@store');
    Route::get('services/{id}', 'ServicesController@show');
//    Route::post('services/{id}', 'ServicesController@update');
//    Route::delete('services/{id}', 'ServicesController@destroy');
//    Route::get('services/{prod_id}/checkPrice', 'ServicesController@highestPrice');

//    Route::get('shareholders', 'ShareholdersController@index');
//    Route::post('shareholders', 'ShareholdersController@store');
//    Route::get('shareholders/{id}', 'ShareholdersController@show');
//    Route::post('shareholders/{id}', 'ShareholdersController@update');
//    Route::delete('shareholders/{id}', 'ShareholdersController@destroy');

    Route::get('terminals', 'TerminalsController@index');
//   Route::post('terminals', 'TerminalsController@store');
    Route::get('terminals/{id}', 'TerminalsController@show');
//    Route::post('terminals/{id}', 'TerminalsController@update');
//    Route::delete('terminals/{id}', 'TerminalsController@destroy');

    Route::get('transactions', 'TransactionsController@index');
    Route::post('transactions', 'TransactionsController@store');
    //Route::get('transactions/updateStatus', 'TransactionsController@updateStatus');
    Route::post('transactions/checkInquiry', 'TransactionsController@checkInquiry');
    Route::post('transactions/checkStatus', 'TransactionsController@checkStatus');
    Route::post('transactions/settlement', 'TransactionsController@settlement');
    Route::get('transactions/summary', 'TransactionsController@summary');
    Route::get('transactions/{id}', 'TransactionsController@show');
    Route::post('transactions/{id}', 'TransactionsController@update');
    Route::delete('transactions/{id}', 'TransactionsController@destroy');

//    Route::get('transactionsBJB', 'TransactionBJBsController@index');
//    Route::post('transactionsBJB', 'TransactionBJBsController@store');
//    Route::get('transactionsBJB/{id}', 'TransactionBJBsController@show');
//    Route::post('transactionsBJB/{id}', 'TransactionBJBsController@update');
//    Route::delete('transactionsBJB/{id}', 'TransactionBJBsController@destroy');

//    Route::get('transactionStatuses', 'TransactionStatusesController@index');
//    Route::post('transactionStatuses', 'TransactionStatusesController@store');

//    Route::get('transactionPaymentStatuses', 'TransactionPaymentStatusesController@index');
//    Route::post('transactionPaymentStatuses', 'TransactionPaymentStatusesController@store');

//    Route::get('topups', 'TopupsController@index');
//    Route::post('topups', 'TopupsController@store');
//    Route::get('topups/{id}', 'TopupsController@show');
//    Route::post('topups/{id}', 'TopupsController@update');
//    Route::delete('topups/{id}', 'TopupsController@destroy');

//    Route::post('userGroups', 'UserGroupsController@store');
//    Route::get('userGroups/{id}', 'UserGroupsController@show');
//    Route::delete('userGroups/{id}', 'UserGroupsController@destroy');

//    Route::post('userChilds', 'UserChildsController@store');
//    Route::get('userChilds/{id}', 'UserChildsController@show');
//    Route::delete('userChilds/{id}', 'UserChildsController@destroy');

    Route::get('users', 'UsersController@index');
//    Route::post('users', 'UsersController@store');
    Route::get('users/{id}', 'UsersController@show');
//    Route::post('users/{id}', 'UsersController@update');
//    Route::delete('users/{id}', 'UsersController@destroy'); 
//    Route::delete('users/{id}', 'UsersController@destroy'); 

//    Route::get('versions/lastest', 'VersionsController@latest');

    Route::group(['prefix'=>'staging'], function(){
    Route::get('transactions', 'TransactionsStagingController@index');
    Route::post('transactions', 'TransactionsStagingController@store');
    Route::get('transactions/updateStatus', 'TransactionsStagingController@updateStatus');
    Route::post('transactions/checkInquiry', 'TransactionsStagingController@checkInquiry');
    Route::post('transactions/checkStatus', 'TransactionsStagingController@checkStatus');
    Route::post('transactions/settlement', 'TransactionsStagingController@settlement');
    Route::get('transactions/summary', 'TransactionsStagingController@summary');
    Route::get('transactions/{id}', 'TransactionsStagingController@show');
    Route::post('transactions/{id}', 'TransactionsStagingController@update');
    Route::delete('transactions/{id}', 'TransactionsStagingController@destroy');
    });
});
