<?php

namespace App\Domains\Type\Http\Controllers\Backend\Type;

use App\Http\Controllers\Controller;
use App\Domains\Type\Models\Type;
use App\Domains\Type\Services\TypeService;

/**
 * Class DeletedTypeController.
 */
class DeletedTypeController extends Controller
{
    /**
     * @var TypeService
     */
    protected $typeService;

    /**
     * DeletedTypeController constructor.
     *
     * @param  TypeService  $typeService
     */
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.type.deleted');
    }

    /**
     * @param  Type  $deletedType
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Type $deletedType)
    {
        $this->typeService->restore($deletedType);

        return redirect()->route('admin.type.index')->withFlashSuccess(__('The Types was successfully restored.'));
    }

    /**
     * @param  Type  $deletedType
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Type $deletedType)
    {
        $this->typeService->destroy($deletedType);

        return redirect()->route('admin.type.deleted')->withFlashSuccess(__('The Types was permanently deleted.'));
    }
}