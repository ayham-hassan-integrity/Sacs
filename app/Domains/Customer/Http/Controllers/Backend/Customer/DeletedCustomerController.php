<?php

namespace App\Domains\Customer\Http\Controllers\Backend\Customer;

use App\Http\Controllers\Controller;
use App\Domains\Customer\Models\Customer;
use App\Domains\Customer\Services\CustomerService;

/**
 * Class DeletedCustomerController.
 */
class DeletedCustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    protected $customerService;

    /**
     * DeletedCustomerController constructor.
     *
     * @param  CustomerService  $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.customer.deleted');
    }

    /**
     * @param  Customer  $deletedCustomer
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Customer $deletedCustomer)
    {
        $this->customerService->restore($deletedCustomer);

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('The Customers was successfully restored.'));
    }

    /**
     * @param  Customer  $deletedCustomer
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Customer $deletedCustomer)
    {
        $this->customerService->destroy($deletedCustomer);

        return redirect()->route('admin.customer.deleted')->withFlashSuccess(__('The Customers was permanently deleted.'));
    }
}