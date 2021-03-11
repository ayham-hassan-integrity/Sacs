<?php

namespace App\Domains\CustomerAddress\Services;

use App\Domains\CustomerAddress\Models\CustomerAddress;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class CustomerAddressService.
 */
class CustomerAddressService extends BaseService
{
    /**
     * CustomerAddressService constructor.
     *
     * @param CustomerAddress $customeraddress
     */
    public function __construct(CustomerAddress $customeraddress)
    {
        $this->model = $customeraddress;
    }

    /**
     * @param array $data
     *
     * @return CustomerAddress
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): CustomerAddress
    {
        DB::beginTransaction();

        try {
            $customeraddress = $this->model::create([
                'customer_id' => $data['customer_id'],
                'address_id' => $data['address_id'],
                'rec_date' => $data['rec_date'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this customeraddress. Please try again.'));
        }

        DB::commit();

        return $customeraddress;
    }

    /**
     * @param CustomerAddress $customeraddress
     * @param array $data
     *
     * @return CustomerAddress
     * @throws \Throwable
     */
    public function update(CustomerAddress $customeraddress, array $data = []): CustomerAddress
    {
        DB::beginTransaction();

        try {
            $customeraddress->update([
                'customer_id' => $data['customer_id'],
                'address_id' => $data['address_id'],
                'rec_date' => $data['rec_date'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this customeraddress. Please try again.'));
        }

        DB::commit();

        return $customeraddress;
    }

    /**
     * @param CustomerAddress $customeraddress
     *
     * @return CustomerAddress
     * @throws GeneralException
     */
    public function delete(CustomerAddress $customeraddress): CustomerAddress
    {
        if ($this->deleteById($customeraddress->id)) {
            return $customeraddress;
        }

        throw new GeneralException('There was a problem deleting this customeraddress. Please try again.');
    }

    /**
     * @param CustomerAddress $customeraddress
     *
     * @return CustomerAddress
     * @throws GeneralException
     */
    public function restore(CustomerAddress $customeraddress): CustomerAddress
    {
        if ($customeraddress->restore()) {
            return $customeraddress;
        }

        throw new GeneralException(__('There was a problem restoring this Customer Address. Please try again.'));
    }

    /**
     * @param CustomerAddress $customeraddress
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(CustomerAddress $customeraddress): bool
    {
        if ($customeraddress->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this Customer Address. Please try again.'));
    }
}