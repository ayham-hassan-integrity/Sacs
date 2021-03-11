<?php

namespace App\Domains\CustomerAddress\Http\Controllers\Backend\CustomerAddress;

use App\Http\Controllers\Controller;
use App\Domains\CustomerAddress\Models\CustomerAddress;
use App\Domains\CustomerAddress\Services\CustomerAddressService;

/**
 * Class DeletedCustomerAddressController.
 */
class DeletedCustomerAddressController extends Controller
{
    /**
     * @var CustomerAddressService
     */
    protected $customeraddressService;

    /**
     * DeletedCustomerAddressController constructor.
     *
     * @param  CustomerAddressService  $customeraddressService
     */
    public function __construct(CustomerAddressService $customeraddressService)
    {
        $this->customeraddressService = $customeraddressService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.customer-address.deleted');
    }

    /**
     * @param  CustomerAddress  $deletedCustomerAddress
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(CustomerAddress $deletedCustomerAddress)
    {
        $this->customeraddressService->restore($deletedCustomerAddress);

        return redirect()->route('admin.customeraddress.index')->withFlashSuccess(__('The Customer Address was successfully restored.'));
    }

    /**
     * @param  CustomerAddress  $deletedCustomerAddress
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(CustomerAddress $deletedCustomerAddress)
    {
        $this->customeraddressService->destroy($deletedCustomerAddress);

        return redirect()->route('admin.customeraddress.deleted')->withFlashSuccess(__('The Customer Address was permanently deleted.'));
    }
}