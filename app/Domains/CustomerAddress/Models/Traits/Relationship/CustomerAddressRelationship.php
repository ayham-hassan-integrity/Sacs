<?php

namespace App\Domains\CustomerAddress\Models\Traits\Relationship;

/**
 * Trait CustomerAddressRelationship.
 */
trait CustomerAddressRelationship
{



       /**
    * Get  the Customer that owns the CustomerAddress.
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id');
    }
       /**
    * Get  the Address that owns the CustomerAddress.
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function address() {
        return $this->belongsTo(Address::class,'address_id');
    }

}