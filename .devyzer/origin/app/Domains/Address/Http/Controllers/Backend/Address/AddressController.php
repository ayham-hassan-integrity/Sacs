<?php

namespace App\Domains\Address\Http\Controllers\Backend\Address;

use App\Http\Controllers\Controller;
use App\Domains\Address\Models\Address;
use App\Domains\Address\Services\AddressService;
use App\Domains\Address\Http\Requests\Backend\Address\DeleteAddressRequest;
use App\Domains\Address\Http\Requests\Backend\Address\EditAddressRequest;
use App\Domains\Address\Http\Requests\Backend\Address\StoreAddressRequest;
use App\Domains\Address\Http\Requests\Backend\Address\UpdateAddressRequest;

/**
 * Class AddressController.
 */
class AddressController extends Controller
{
    /**
     * @var AddressService
     */
    protected $addressService;

    /**
     * AddressController constructor.
     *
     * @param AddressService $addressService
     */
    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.address.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.address.create');
    }

    /**
     * @param StoreAddressRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreAddressRequest $request)
    {
        $address = $this->addressService->store($request->validated());

        return redirect()->route('admin.address.show', $address)->withFlashSuccess(__('The Addresses was successfully created.'));
    }

    /**
     * @param Address $address
     *
     * @return mixed
     */
    public function show(Address $address)
    {
        return view('backend.address.show')
            ->withAddress($address);
    }

    /**
     * @param EditAddressRequest $request
     * @param Address $address
     *
     * @return mixed
     */
    public function edit(EditAddressRequest $request, Address $address)
    {
        return view('backend.address.edit')
            ->withAddress($address);
    }

    /**
     * @param UpdateAddressRequest $request
     * @param Address $address
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $this->addressService->update($address, $request->validated());

        return redirect()->route('admin.address.show', $address)->withFlashSuccess(__('The Addresses was successfully updated.'));
    }

    /**
     * @param DeleteAddressRequest $request
     * @param Address $address
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteAddressRequest $request, Address $address)
    {
        $this->addressService->delete($address);

        return redirect()->route('admin.$address.deleted')->withFlashSuccess(__('The Addresses was successfully deleted.'));
    }
}