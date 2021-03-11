<?php

use App\Domains\Address\Http\Controllers\Backend\Address\DeletedAddressController;
use App\Domains\Address\Http\Controllers\Backend\Address\AddressController;
use App\Domains\Address\Models\Address;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'address',
    'as' => 'address.',
], function () {

    Route::get('/', [AddressController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Addresses'), route('admin.address.index'));
        });


    Route::get('deleted', [DeletedAddressController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.address.index')
                ->push(__('Deleted Addresses'), route('admin.address.deleted'));
        });


    Route::get('create', [AddressController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.address.index')
                ->push(__('Create Address'), route('admin.address.create'));
        });

    Route::post('/', [AddressController::class, 'store'])->name('store');

    Route::group(['prefix' => '{address}'], function () {
        Route::get('/', [AddressController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Address $address) {
                $trail->parent('admin.address.index')
                    ->push($address->title, route('admin.address.show', $address));
            });

        Route::get('edit', [AddressController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Address $address) {
                $trail->parent('admin.address.show', $address)
                    ->push(__('Edit'), route('admin.address.edit', $address));
            });

        Route::patch('/', [AddressController::class, 'update'])->name('update');
        Route::delete('/', [AddressController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedAddress}'], function () {
        Route::patch('restore', [DeletedAddressController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedAddressController::class, 'destroy'])->name('permanently-delete');
    });
});