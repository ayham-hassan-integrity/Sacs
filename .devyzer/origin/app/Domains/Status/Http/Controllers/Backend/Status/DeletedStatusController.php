<?php

namespace App\Domains\Status\Http\Controllers\Backend\Status;

use App\Http\Controllers\Controller;
use App\Domains\Status\Models\Status;
use App\Domains\Status\Services\StatusService;

/**
 * Class DeletedStatusController.
 */
class DeletedStatusController extends Controller
{
    /**
     * @var StatusService
     */
    protected $statusService;

    /**
     * DeletedStatusController constructor.
     *
     * @param  StatusService  $statusService
     */
    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.status.deleted');
    }

    /**
     * @param  Status  $deletedStatus
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Status $deletedStatus)
    {
        $this->statusService->restore($deletedStatus);

        return redirect()->route('admin.status.index')->withFlashSuccess(__('The Status was successfully restored.'));
    }

    /**
     * @param  Status  $deletedStatus
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Status $deletedStatus)
    {
        $this->statusService->destroy($deletedStatus);

        return redirect()->route('admin.status.deleted')->withFlashSuccess(__('The Status was permanently deleted.'));
    }
}