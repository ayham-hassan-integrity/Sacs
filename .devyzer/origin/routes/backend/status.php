<?php

use App\Domains\Status\Http\Controllers\Backend\Status\DeletedStatusController;
use App\Domains\Status\Http\Controllers\Backend\Status\StatusController;
use App\Domains\Status\Models\Status;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'status',
    'as' => 'status.',
], function () {

    Route::get('/', [StatusController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Status'), route('admin.status.index'));
        });


    Route::get('deleted', [DeletedStatusController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.status.index')
                ->push(__('Deleted Status'), route('admin.status.deleted'));
        });


    Route::get('create', [StatusController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.status.index')
                ->push(__('Create Status'), route('admin.status.create'));
        });

    Route::post('/', [StatusController::class, 'store'])->name('store');

    Route::group(['prefix' => '{status}'], function () {
        Route::get('/', [StatusController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Status $status) {
                $trail->parent('admin.status.index')
                    ->push($status->title, route('admin.status.show', $status));
            });

        Route::get('edit', [StatusController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Status $status) {
                $trail->parent('admin.status.show', $status)
                    ->push(__('Edit'), route('admin.status.edit', $status));
            });

        Route::patch('/', [StatusController::class, 'update'])->name('update');
        Route::delete('/', [StatusController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedStatus}'], function () {
        Route::patch('restore', [DeletedStatusController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedStatusController::class, 'destroy'])->name('permanently-delete');
    });
});