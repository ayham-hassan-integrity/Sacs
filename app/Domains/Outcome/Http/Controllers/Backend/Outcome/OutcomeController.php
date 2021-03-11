<?php

namespace App\Domains\Outcome\Http\Controllers\Backend\Outcome;

use App\Http\Controllers\Controller;
use App\Domains\Outcome\Models\Outcome;
use App\Domains\Outcome\Services\OutcomeService;
use App\Domains\Outcome\Http\Requests\Backend\Outcome\DeleteOutcomeRequest;
use App\Domains\Outcome\Http\Requests\Backend\Outcome\EditOutcomeRequest;
use App\Domains\Outcome\Http\Requests\Backend\Outcome\StoreOutcomeRequest;
use App\Domains\Outcome\Http\Requests\Backend\Outcome\UpdateOutcomeRequest;

/**
 * Class OutcomeController.
 */
class OutcomeController extends Controller
{
    /**
     * @var OutcomeService
     */
    protected $outcomeService;

    /**
     * OutcomeController constructor.
     *
     * @param OutcomeService $outcomeService
     */
    public function __construct(OutcomeService $outcomeService)
    {
        $this->outcomeService = $outcomeService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.outcome.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.outcome.create');
    }

    /**
     * @param StoreOutcomeRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreOutcomeRequest $request)
    {
        $outcome = $this->outcomeService->store($request->validated());

        return redirect()->route('admin.outcome.show', $outcome)->withFlashSuccess(__('The Outcome was successfully created.'));
    }

    /**
     * @param Outcome $outcome
     *
     * @return mixed
     */
    public function show(Outcome $outcome)
    {
        return view('backend.outcome.show')
            ->withOutcome($outcome);
    }

    /**
     * @param EditOutcomeRequest $request
     * @param Outcome $outcome
     *
     * @return mixed
     */
    public function edit(EditOutcomeRequest $request, Outcome $outcome)
    {
        return view('backend.outcome.edit')
            ->withOutcome($outcome);
    }

    /**
     * @param UpdateOutcomeRequest $request
     * @param Outcome $outcome
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateOutcomeRequest $request, Outcome $outcome)
    {
        $this->outcomeService->update($outcome, $request->validated());

        return redirect()->route('admin.outcome.show', $outcome)->withFlashSuccess(__('The Outcome was successfully updated.'));
    }

    /**
     * @param DeleteOutcomeRequest $request
     * @param Outcome $outcome
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteOutcomeRequest $request, Outcome $outcome)
    {
        $this->outcomeService->delete($outcome);

        return redirect()->route('admin.$outcome.deleted')->withFlashSuccess(__('The Outcome was successfully deleted.'));
    }
}