<?php

use App\Domains\CustomerAddress\Http\Controllers\Backend\CustomerAddress\DeletedCustomerAddressController;
use App\Domains\CustomerAddress\Http\Controllers\Backend\CustomerAddress\CustomerAddressController;
use App\Domains\CustomerAddress\Models\CustomerAddress;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'customeraddress',
    'as' => 'customeraddress.',
], function () {

    Route::get('/', [CustomerAddressController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Customer Address'), route('admin.customeraddress.index'));
        });


    Route::get('deleted', [DeletedCustomerAddressController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.customeraddress.index')
                ->push(__('Deleted Customer Address'), route('admin.customeraddress.deleted'));
        });


    Route::get('create', [CustomerAddressController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.customeraddress.index')
                ->push(__('Create CustomerAddress'), route('admin.customeraddress.create'));
        });

    Route::post('/', [CustomerAddressController::class, 'store'])->name('store');

    Route::group(['prefix' => '{customeraddress}'], function () {
        Route::get('/', [CustomerAddressController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, CustomerAddress $customeraddress) {
                $trail->parent('admin.customeraddress.index')
                    ->push($customeraddress->title, route('admin.customeraddress.show', $customeraddress));
            });

        Route::get('edit', [CustomerAddressController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, CustomerAddress $customeraddress) {
                $trail->parent('admin.customeraddress.show', $customeraddress)
                    ->push(__('Edit'), route('admin.customeraddress.edit', $customeraddress));
            });

        Route::patch('/', [CustomerAddressController::class, 'update'])->name('update');
        Route::delete('/', [CustomerAddressController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedCustomerAddress}'], function () {
        Route::patch('restore', [DeletedCustomerAddressController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedCustomerAddressController::class, 'destroy'])->name('permanently-delete');
    });
});