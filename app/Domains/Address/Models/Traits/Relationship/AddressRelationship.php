<?php

namespace App\Domains\Address\Models\Traits\Relationship;

/**
 * Trait AddressRelationship.
 */
trait AddressRelationship
{

    /**
    * Get all the customers for the Address.
    * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
    */
    public function customers() {
        return $this->belongsToMany(Customer::class,'customer_addresses')->whereNull('customer_addresses.deleted_at')->withTimestamps()->withPivot([ 'details',]);
    }



}