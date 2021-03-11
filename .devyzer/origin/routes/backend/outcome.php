<?php

use App\Domains\Outcome\Http\Controllers\Backend\Outcome\DeletedOutcomeController;
use App\Domains\Outcome\Http\Controllers\Backend\Outcome\OutcomeController;
use App\Domains\Outcome\Models\Outcome;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'outcome',
    'as' => 'outcome.',
], function () {

    Route::get('/', [OutcomeController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Outcome'), route('admin.outcome.index'));
        });


    Route::get('deleted', [DeletedOutcomeController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.outcome.index')
                ->push(__('Deleted Outcome'), route('admin.outcome.deleted'));
        });


    Route::get('create', [OutcomeController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.outcome.index')
                ->push(__('Create Outcome'), route('admin.outcome.create'));
        });

    Route::post('/', [OutcomeController::class, 'store'])->name('store');

    Route::group(['prefix' => '{outcome}'], function () {
        Route::get('/', [OutcomeController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Outcome $outcome) {
                $trail->parent('admin.outcome.index')
                    ->push($outcome->title, route('admin.outcome.show', $outcome));
            });

        Route::get('edit', [OutcomeController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Outcome $outcome) {
                $trail->parent('admin.outcome.show', $outcome)
                    ->push(__('Edit'), route('admin.outcome.edit', $outcome));
            });

        Route::patch('/', [OutcomeController::class, 'update'])->name('update');
        Route::delete('/', [OutcomeController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedOutcome}'], function () {
        Route::patch('restore', [DeletedOutcomeController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedOutcomeController::class, 'destroy'])->name('permanently-delete');
    });
});