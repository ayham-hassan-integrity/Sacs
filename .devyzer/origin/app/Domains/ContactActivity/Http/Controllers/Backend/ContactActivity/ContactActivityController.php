<?php

namespace App\Domains\ContactActivity\Http\Controllers\Backend\ContactActivity;

use App\Http\Controllers\Controller;
use App\Domains\ContactActivity\Models\ContactActivity;
use App\Domains\ContactActivity\Services\ContactActivityService;
use App\Domains\ContactActivity\Http\Requests\Backend\ContactActivity\DeleteContactActivityRequest;
use App\Domains\ContactActivity\Http\Requests\Backend\ContactActivity\EditContactActivityRequest;
use App\Domains\ContactActivity\Http\Requests\Backend\ContactActivity\StoreContactActivityRequest;
use App\Domains\ContactActivity\Http\Requests\Backend\ContactActivity\UpdateContactActivityRequest;

/**
 * Class ContactActivityController.
 */
class ContactActivityController extends Controller
{
    /**
     * @var ContactActivityService
     */
    protected $contactactivityService;

    /**
     * ContactActivityController constructor.
     *
     * @param ContactActivityService $contactactivityService
     */
    public function __construct(ContactActivityService $contactactivityService)
    {
        $this->contactactivityService = $contactactivityService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.contact-activity.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.contact-activity.create');
    }

    /**
     * @param StoreContactActivityRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreContactActivityRequest $request)
    {
        $contactactivity = $this->contactactivityService->store($request->validated());

        return redirect()->route('admin.contactactivity.show', $contactactivity)->withFlashSuccess(__('The Contact Activities was successfully created.'));
    }

    /**
     * @param ContactActivity $contactactivity
     *
     * @return mixed
     */
    public function show(ContactActivity $contactactivity)
    {
        return view('backend.contact-activity.show')
            ->withContactActivity($contactactivity);
    }

    /**
     * @param EditContactActivityRequest $request
     * @param ContactActivity $contactactivity
     *
     * @return mixed
     */
    public function edit(EditContactActivityRequest $request, ContactActivity $contactactivity)
    {
        return view('backend.contact-activity.edit')
            ->withContactActivity($contactactivity);
    }

    /**
     * @param UpdateContactActivityRequest $request
     * @param ContactActivity $contactactivity
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateContactActivityRequest $request, ContactActivity $contactactivity)
    {
        $this->contactactivityService->update($contactactivity, $request->validated());

        return redirect()->route('admin.contactactivity.show', $contactactivity)->withFlashSuccess(__('The Contact Activities was successfully updated.'));
    }

    /**
     * @param DeleteContactActivityRequest $request
     * @param ContactActivity $contactactivity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteContactActivityRequest $request, ContactActivity $contactactivity)
    {
        $this->contactactivityService->delete($contactactivity);

        return redirect()->route('admin.$contactactivity.deleted')->withFlashSuccess(__('The Contact Activities was successfully deleted.'));
    }
}