<?php

namespace App\Domains\Status\Http\Controllers\Backend\Status;

use App\Http\Controllers\Controller;
use App\Domains\Status\Models\Status;
use App\Domains\Status\Services\StatusService;
use App\Domains\Status\Http\Requests\Backend\Status\DeleteStatusRequest;
use App\Domains\Status\Http\Requests\Backend\Status\EditStatusRequest;
use App\Domains\Status\Http\Requests\Backend\Status\StoreStatusRequest;
use App\Domains\Status\Http\Requests\Backend\Status\UpdateStatusRequest;

/**
 * Class StatusController.
 */
class StatusController extends Controller
{
    /**
     * @var StatusService
     */
    protected $statusService;

    /**
     * StatusController constructor.
     *
     * @param StatusService $statusService
     */
    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.status.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.status.create');
    }

    /**
     * @param StoreStatusRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreStatusRequest $request)
    {
        $status = $this->statusService->store($request->validated());

        return redirect()->route('admin.status.show', $status)->withFlashSuccess(__('The Status was successfully created.'));
    }

    /**
     * @param Status $status
     *
     * @return mixed
     */
    public function show(Status $status)
    {
        return view('backend.status.show')
            ->withStatus($status);
    }

    /**
     * @param EditStatusRequest $request
     * @param Status $status
     *
     * @return mixed
     */
    public function edit(EditStatusRequest $request, Status $status)
    {
        return view('backend.status.edit')
            ->withStatus($status);
    }

    /**
     * @param UpdateStatusRequest $request
     * @param Status $status
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $this->statusService->update($status, $request->validated());

        return redirect()->route('admin.status.show', $status)->withFlashSuccess(__('The Status was successfully updated.'));
    }

    /**
     * @param DeleteStatusRequest $request
     * @param Status $status
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteStatusRequest $request, Status $status)
    {
        $this->statusService->delete($status);

        return redirect()->route('admin.$status.deleted')->withFlashSuccess(__('The Status was successfully deleted.'));
    }
}