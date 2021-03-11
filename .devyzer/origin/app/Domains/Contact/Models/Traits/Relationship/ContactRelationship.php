<?php

namespace App\Domains\Contact\Models\Traits\Relationship;

/**
 * Trait ContactRelationship.
 */
trait ContactRelationship
{
    /**
    * Get all the contact_activities for the Contact.
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function getContactActivities() {
        return $this->hasMany(ContactActivity::class)->latest();
    }



       /**
    * Get  the Customer that owns the Contact.
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id');
    }
       /**
    * Get  the Status that owns the Contact.
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function status() {
        return $this->belongsTo(Status::class,'status_id');
    }

}