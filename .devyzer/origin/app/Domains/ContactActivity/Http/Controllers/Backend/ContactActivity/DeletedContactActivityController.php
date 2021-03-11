<?php

namespace App\Domains\ContactActivity\Http\Controllers\Backend\ContactActivity;

use App\Http\Controllers\Controller;
use App\Domains\ContactActivity\Models\ContactActivity;
use App\Domains\ContactActivity\Services\ContactActivityService;

/**
 * Class DeletedContactActivityController.
 */
class DeletedContactActivityController extends Controller
{
    /**
     * @var ContactActivityService
     */
    protected $contactactivityService;

    /**
     * DeletedContactActivityController constructor.
     *
     * @param  ContactActivityService  $contactactivityService
     */
    public function __construct(ContactActivityService $contactactivityService)
    {
        $this->contactactivityService = $contactactivityService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.contact-activity.deleted');
    }

    /**
     * @param  ContactActivity  $deletedContactActivity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(ContactActivity $deletedContactActivity)
    {
        $this->contactactivityService->restore($deletedContactActivity);

        return redirect()->route('admin.contactactivity.index')->withFlashSuccess(__('The Contact Activities was successfully restored.'));
    }

    /**
     * @param  ContactActivity  $deletedContactActivity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(ContactActivity $deletedContactActivity)
    {
        $this->contactactivityService->destroy($deletedContactActivity);

        return redirect()->route('admin.contactactivity.deleted')->withFlashSuccess(__('The Contact Activities was permanently deleted.'));
    }
}