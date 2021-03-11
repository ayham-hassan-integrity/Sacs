<?php

namespace App\Domains\Customer\Observers;

use App\Domains\Customer\Models\Customer;

/**
 * Class CustomerObserver.
 */
class CustomerObserver
{
    /**
     * @param  Customer  $customer
     */
    public function created(Customer $customer): void
    {

    }

    /**
     * @param  Customer  $customer
     */
    public function updated(Customer $customer): void
    {

    }

}
