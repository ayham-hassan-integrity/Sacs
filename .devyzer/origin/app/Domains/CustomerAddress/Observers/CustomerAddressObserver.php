<?php

namespace App\Domains\CustomerAddress\Observers;

use App\Domains\CustomerAddress\Models\CustomerAddress;

/**
 * Class CustomerAddressObserver.
 */
class CustomerAddressObserver
{
    /**
     * @param  CustomerAddress  $customeraddress
     */
    public function created(CustomerAddress $customeraddress): void
    {

    }

    /**
     * @param  CustomerAddress  $customeraddress
     */
    public function updated(CustomerAddress $customeraddress): void
    {

    }

}
