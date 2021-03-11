<?php

namespace App\Domains\Customer\Http\Controllers\Backend\Customer;

use App\Http\Controllers\Controller;
use App\Domains\Customer\Models\Customer;
use App\Domains\Customer\Services\CustomerService;
use App\Domains\Customer\Http\Requests\Backend\Customer\DeleteCustomerRequest;
use App\Domains\Customer\Http\Requests\Backend\Customer\EditCustomerRequest;
use App\Domains\Customer\Http\Requests\Backend\Customer\StoreCustomerRequest;
use App\Domains\Customer\Http\Requests\Backend\Customer\UpdateCustomerRequest;

/**
 * Class CustomerController.
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    protected $customerService;

    /**
     * CustomerController constructor.
     *
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.customer.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * @param StoreCustomerRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customerService->store($request->validated());

        return redirect()->route('admin.customer.show', $customer)->withFlashSuccess(__('The Customers was successfully created.'));
    }

    /**
     * @param Customer $customer
     *
     * @return mixed
     */
    public function show(Customer $customer)
    {
        return view('backend.customer.show')
            ->withCustomer($customer);
    }

    /**
     * @param EditCustomerRequest $request
     * @param Customer $customer
     *
     * @return mixed
     */
    public function edit(EditCustomerRequest $request, Customer $customer)
    {
        return view('backend.customer.edit')
            ->withCustomer($customer);
    }

    /**
     * @param UpdateCustomerRequest $request
     * @param Customer $customer
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->customerService->update($customer, $request->validated());

        return redirect()->route('admin.customer.show', $customer)->withFlashSuccess(__('The Customers was successfully updated.'));
    }

    /**
     * @param DeleteCustomerRequest $request
     * @param Customer $customer
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteCustomerRequest $request, Customer $customer)
    {
        $this->customerService->delete($customer);

        return redirect()->route('admin.$customer.deleted')->withFlashSuccess(__('The Customers was successfully deleted.'));
    }
}