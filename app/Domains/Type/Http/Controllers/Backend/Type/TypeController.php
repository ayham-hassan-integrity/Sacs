<?php

namespace App\Domains\Type\Http\Controllers\Backend\Type;

use App\Http\Controllers\Controller;
use App\Domains\Type\Models\Type;
use App\Domains\Type\Services\TypeService;
use App\Domains\Type\Http\Requests\Backend\Type\DeleteTypeRequest;
use App\Domains\Type\Http\Requests\Backend\Type\EditTypeRequest;
use App\Domains\Type\Http\Requests\Backend\Type\StoreTypeRequest;
use App\Domains\Type\Http\Requests\Backend\Type\UpdateTypeRequest;

/**
 * Class TypeController.
 */
class TypeController extends Controller
{
    /**
     * @var TypeService
     */
    protected $typeService;

    /**
     * TypeController constructor.
     *
     * @param TypeService $typeService
     */
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.type.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.type.create');
    }

    /**
     * @param StoreTypeRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreTypeRequest $request)
    {
        $type = $this->typeService->store($request->validated());

        return redirect()->route('admin.type.show', $type)->withFlashSuccess(__('The Types was successfully created.'));
    }

    /**
     * @param Type $type
     *
     * @return mixed
     */
    public function show(Type $type)
    {
        return view('backend.type.show')
            ->withType($type);
    }

    /**
     * @param EditTypeRequest $request
     * @param Type $type
     *
     * @return mixed
     */
    public function edit(EditTypeRequest $request, Type $type)
    {
        return view('backend.type.edit')
            ->withType($type);
    }

    /**
     * @param UpdateTypeRequest $request
     * @param Type $type
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $this->typeService->update($type, $request->validated());

        return redirect()->route('admin.type.show', $type)->withFlashSuccess(__('The Types was successfully updated.'));
    }

    /**
     * @param DeleteTypeRequest $request
     * @param Type $type
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteTypeRequest $request, Type $type)
    {
        $this->typeService->delete($type);

        return redirect()->route('admin.$type.deleted')->withFlashSuccess(__('The Types was successfully deleted.'));
    }
}