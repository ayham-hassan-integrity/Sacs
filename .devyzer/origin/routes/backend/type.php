<?php

use App\Domains\Type\Http\Controllers\Backend\Type\DeletedTypeController;
use App\Domains\Type\Http\Controllers\Backend\Type\TypeController;
use App\Domains\Type\Models\Type;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'type',
    'as' => 'type.',
], function () {

    Route::get('/', [TypeController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Types'), route('admin.type.index'));
        });


    Route::get('deleted', [DeletedTypeController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.type.index')
                ->push(__('Deleted Types'), route('admin.type.deleted'));
        });


    Route::get('create', [TypeController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.type.index')
                ->push(__('Create Type'), route('admin.type.create'));
        });

    Route::post('/', [TypeController::class, 'store'])->name('store');

    Route::group(['prefix' => '{type}'], function () {
        Route::get('/', [TypeController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Type $type) {
                $trail->parent('admin.type.index')
                    ->push($type->title, route('admin.type.show', $type));
            });

        Route::get('edit', [TypeController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Type $type) {
                $trail->parent('admin.type.show', $type)
                    ->push(__('Edit'), route('admin.type.edit', $type));
            });

        Route::patch('/', [TypeController::class, 'update'])->name('update');
        Route::delete('/', [TypeController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedType}'], function () {
        Route::patch('restore', [DeletedTypeController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedTypeController::class, 'destroy'])->name('permanently-delete');
    });
});