<?php

use App\Domains\Customer\Http\Controllers\Backend\Customer\DeletedCustomerController;
use App\Domains\Customer\Http\Controllers\Backend\Customer\CustomerController;
use App\Domains\Customer\Models\Customer;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'customer',
    'as' => 'customer.',
], function () {

    Route::get('/', [CustomerController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Customers'), route('admin.customer.index'));
        });


    Route::get('deleted', [DeletedCustomerController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.customer.index')
                ->push(__('Deleted Customers'), route('admin.customer.deleted'));
        });


    Route::get('create', [CustomerController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.customer.index')
                ->push(__('Create Customer'), route('admin.customer.create'));
        });

    Route::post('/', [CustomerController::class, 'store'])->name('store');

    Route::group(['prefix' => '{customer}'], function () {
        Route::get('/', [CustomerController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Customer $customer) {
                $trail->parent('admin.customer.index')
                    ->push($customer->title, route('admin.customer.show', $customer));
            });

        Route::get('edit', [CustomerController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Customer $customer) {
                $trail->parent('admin.customer.show', $customer)
                    ->push(__('Edit'), route('admin.customer.edit', $customer));
            });

        Route::patch('/', [CustomerController::class, 'update'])->name('update');
        Route::delete('/', [CustomerController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedCustomer}'], function () {
        Route::patch('restore', [DeletedCustomerController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedCustomerController::class, 'destroy'])->name('permanently-delete');
    });
});