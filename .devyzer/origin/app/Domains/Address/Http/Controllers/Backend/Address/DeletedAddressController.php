<?php

namespace App\Domains\Address\Http\Controllers\Backend\Address;

use App\Http\Controllers\Controller;
use App\Domains\Address\Models\Address;
use App\Domains\Address\Services\AddressService;

/**
 * Class DeletedAddressController.
 */
class DeletedAddressController extends Controller
{
    /**
     * @var AddressService
     */
    protected $addressService;

    /**
     * DeletedAddressController constructor.
     *
     * @param  AddressService  $addressService
     */
    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.address.deleted');
    }

    /**
     * @param  Address  $deletedAddress
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Address $deletedAddress)
    {
        $this->addressService->restore($deletedAddress);

        return redirect()->route('admin.address.index')->withFlashSuccess(__('The Addresses was successfully restored.'));
    }

    /**
     * @param  Address  $deletedAddress
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Address $deletedAddress)
    {
        $this->addressService->destroy($deletedAddress);

        return redirect()->route('admin.address.deleted')->withFlashSuccess(__('The Addresses was permanently deleted.'));
    }
}