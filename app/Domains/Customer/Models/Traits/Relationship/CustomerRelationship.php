<?php

namespace App\Domains\Customer\Models\Traits\Relationship;

/**
 * Trait CustomerRelationship.
 */
trait CustomerRelationship
{

    /**
    * Get all the addresses for the Customer.
    * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
    */
    public function addresses() {
        return $this->belongsToMany(Address::class,'customer_addresses')->whereNull('customer_addresses.deleted_at')->withTimestamps()->withPivot([ 'details',]);
    }



}