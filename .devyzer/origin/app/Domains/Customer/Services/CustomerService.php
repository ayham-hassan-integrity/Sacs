<?php

namespace App\Domains\Customer\Services;

use App\Domains\Customer\Models\Customer;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class CustomerService.
 */
class CustomerService extends BaseService
{
    /**
     * CustomerService constructor.
     *
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    /**
     * @param array $data
     *
     * @return Customer
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Customer
    {
        DB::beginTransaction();

        try {
            $customer = $this->model::create([
                'name' => $data['name'],
                'coming_date' => $data['coming_date'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this customer. Please try again.'));
        }

        DB::commit();

        return $customer;
    }

    /**
     * @param Customer $customer
     * @param array $data
     *
     * @return Customer
     * @throws \Throwable
     */
    public function update(Customer $customer, array $data = []): Customer
    {
        DB::beginTransaction();

        try {
            $customer->update([
                'name' => $data['name'],
                'coming_date' => $data['coming_date'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this customer. Please try again.'));
        }

        DB::commit();

        return $customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws GeneralException
     */
    public function delete(Customer $customer): Customer
    {
        if ($this->deleteById($customer->id)) {
            return $customer;
        }

        throw new GeneralException('There was a problem deleting this customer. Please try again.');
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws GeneralException
     */
    public function restore(Customer $customer): Customer
    {
        if ($customer->restore()) {
            return $customer;
        }

        throw new GeneralException(__('There was a problem restoring this Customers. Please try again.'));
    }

    /**
     * @param Customer $customer
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Customer $customer): bool
    {
        if ($customer->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this Customers. Please try again.'));
    }
}