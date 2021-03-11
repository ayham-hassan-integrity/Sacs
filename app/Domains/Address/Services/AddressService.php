<?php

namespace App\Domains\Address\Services;

use App\Domains\Address\Models\Address;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class AddressService.
 */
class AddressService extends BaseService
{
    /**
     * AddressService constructor.
     *
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->model = $address;
    }

    /**
     * @param array $data
     *
     * @return Address
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Address
    {
        DB::beginTransaction();

        try {
            $address = $this->model::create([
                'build_num' => $data['build_num'],
                'street' => $data['street'],
                'area' => $data['area'],
                'city' => $data['city'],
                'zipcode' => $data['zipcode'],
                'country' => $data['country'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this address. Please try again.'));
        }

        DB::commit();

        return $address;
    }

    /**
     * @param Address $address
     * @param array $data
     *
     * @return Address
     * @throws \Throwable
     */
    public function update(Address $address, array $data = []): Address
    {
        DB::beginTransaction();

        try {
            $address->update([
                'build_num' => $data['build_num'],
                'street' => $data['street'],
                'area' => $data['area'],
                'city' => $data['city'],
                'zipcode' => $data['zipcode'],
                'country' => $data['country'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this address. Please try again.'));
        }

        DB::commit();

        return $address;
    }

    /**
     * @param Address $address
     *
     * @return Address
     * @throws GeneralException
     */
    public function delete(Address $address): Address
    {
        if ($this->deleteById($address->id)) {
            return $address;
        }

        throw new GeneralException('There was a problem deleting this address. Please try again.');
    }

    /**
     * @param Address $address
     *
     * @return Address
     * @throws GeneralException
     */
    public function restore(Address $address): Address
    {
        if ($address->restore()) {
            return $address;
        }

        throw new GeneralException(__('There was a problem restoring this Addresses. Please try again.'));
    }

    /**
     * @param Address $address
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Address $address): bool
    {
        if ($address->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this Addresses. Please try again.'));
    }
}