<?php

use App\Domains\ContactActivity\Http\Controllers\Backend\ContactActivity\DeletedContactActivityController;
use App\Domains\ContactActivity\Http\Controllers\Backend\ContactActivity\ContactActivityController;
use App\Domains\ContactActivity\Models\ContactActivity;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'contactactivity',
    'as' => 'contactactivity.',
], function () {

    Route::get('/', [ContactActivityController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Contact Activities'), route('admin.contactactivity.index'));
        });


    Route::get('deleted', [DeletedContactActivityController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.contactactivity.index')
                ->push(__('Deleted Contact Activities'), route('admin.contactactivity.deleted'));
        });


    Route::get('create', [ContactActivityController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.contactactivity.index')
                ->push(__('Create ContactActivity'), route('admin.contactactivity.create'));
        });

    Route::post('/', [ContactActivityController::class, 'store'])->name('store');

    Route::group(['prefix' => '{contactactivity}'], function () {
        Route::get('/', [ContactActivityController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, ContactActivity $contactactivity) {
                $trail->parent('admin.contactactivity.index')
                    ->push($contactactivity->title, route('admin.contactactivity.show', $contactactivity));
            });

        Route::get('edit', [ContactActivityController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ContactActivity $contactactivity) {
                $trail->parent('admin.contactactivity.show', $contactactivity)
                    ->push(__('Edit'), route('admin.contactactivity.edit', $contactactivity));
            });

        Route::patch('/', [ContactActivityController::class, 'update'])->name('update');
        Route::delete('/', [ContactActivityController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedContactActivity}'], function () {
        Route::patch('restore', [DeletedContactActivityController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedContactActivityController::class, 'destroy'])->name('permanently-delete');
    });
});