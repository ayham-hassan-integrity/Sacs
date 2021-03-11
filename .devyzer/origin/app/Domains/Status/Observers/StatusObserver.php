<?php

namespace App\Domains\Status\Observers;

use App\Domains\Status\Models\Status;

/**
 * Class StatusObserver.
 */
class StatusObserver
{
    /**
     * @param  Status  $status
     */
    public function created(Status $status): void
    {

    }

    /**
     * @param  Status  $status
     */
    public function updated(Status $status): void
    {

    }

}
