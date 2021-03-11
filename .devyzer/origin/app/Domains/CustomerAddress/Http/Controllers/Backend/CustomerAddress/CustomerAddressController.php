<?php

namespace App\Domains\CustomerAddress\Http\Controllers\Backend\CustomerAddress;

use App\Http\Controllers\Controller;
use App\Domains\CustomerAddress\Models\CustomerAddress;
use App\Domains\CustomerAddress\Services\CustomerAddressService;
use App\Domains\CustomerAddress\Http\Requests\Backend\CustomerAddress\DeleteCustomerAddressRequest;
use App\Domains\CustomerAddress\Http\Requests\Backend\CustomerAddress\EditCustomerAddressRequest;
use App\Domains\CustomerAddress\Http\Requests\Backend\CustomerAddress\StoreCustomerAddressRequest;
use App\Domains\CustomerAddress\Http\Requests\Backend\CustomerAddress\UpdateCustomerAddressRequest;

/**
 * Class CustomerAddressController.
 */
class CustomerAddressController extends Controller
{
    /**
     * @var CustomerAddressService
     */
    protected $customeraddressService;

    /**
     * CustomerAddressController constructor.
     *
     * @param CustomerAddressService $customeraddressService
     */
    public function __construct(CustomerAddressService $customeraddressService)
    {
        $this->customeraddressService = $customeraddressService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.customer-address.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.customer-address.create');
    }

    /**
     * @param StoreCustomerAddressRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreCustomerAddressRequest $request)
    {
        $customeraddress = $this->customeraddressService->store($request->validated());

        return redirect()->route('admin.customeraddress.show', $customeraddress)->withFlashSuccess(__('The Customer Address was successfully created.'));
    }

    /**
     * @param CustomerAddress $customeraddress
     *
     * @return mixed
     */
    public function show(CustomerAddress $customeraddress)
    {
        return view('backend.customer-address.show')
            ->withCustomerAddress($customeraddress);
    }

    /**
     * @param EditCustomerAddressRequest $request
     * @param CustomerAddress $customeraddress
     *
     * @return mixed
     */
    public function edit(EditCustomerAddressRequest $request, CustomerAddress $customeraddress)
    {
        return view('backend.customer-address.edit')
            ->withCustomerAddress($customeraddress);
    }

    /**
     * @param UpdateCustomerAddressRequest $request
     * @param CustomerAddress $customeraddress
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $customeraddress)
    {
        $this->customeraddressService->update($customeraddress, $request->validated());

        return redirect()->route('admin.customeraddress.show', $customeraddress)->withFlashSuccess(__('The Customer Address was successfully updated.'));
    }

    /**
     * @param DeleteCustomerAddressRequest $request
     * @param CustomerAddress $customeraddress
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteCustomerAddressRequest $request, CustomerAddress $customeraddress)
    {
        $this->customeraddressService->delete($customeraddress);

        return redirect()->route('admin.$customeraddress.deleted')->withFlashSuccess(__('The Customer Address was successfully deleted.'));
    }
}