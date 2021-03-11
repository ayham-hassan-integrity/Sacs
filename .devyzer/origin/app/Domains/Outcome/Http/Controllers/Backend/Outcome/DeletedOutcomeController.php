<?php

namespace App\Domains\Outcome\Http\Controllers\Backend\Outcome;

use App\Http\Controllers\Controller;
use App\Domains\Outcome\Models\Outcome;
use App\Domains\Outcome\Services\OutcomeService;

/**
 * Class DeletedOutcomeController.
 */
class DeletedOutcomeController extends Controller
{
    /**
     * @var OutcomeService
     */
    protected $outcomeService;

    /**
     * DeletedOutcomeController constructor.
     *
     * @param  OutcomeService  $outcomeService
     */
    public function __construct(OutcomeService $outcomeService)
    {
        $this->outcomeService = $outcomeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.outcome.deleted');
    }

    /**
     * @param  Outcome  $deletedOutcome
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Outcome $deletedOutcome)
    {
        $this->outcomeService->restore($deletedOutcome);

        return redirect()->route('admin.outcome.index')->withFlashSuccess(__('The Outcome was successfully restored.'));
    }

    /**
     * @param  Outcome  $deletedOutcome
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Outcome $deletedOutcome)
    {
        $this->outcomeService->destroy($deletedOutcome);

        return redirect()->route('admin.outcome.deleted')->withFlashSuccess(__('The Outcome was permanently deleted.'));
    }
}