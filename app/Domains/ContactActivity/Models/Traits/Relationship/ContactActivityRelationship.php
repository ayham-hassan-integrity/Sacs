<?php

namespace App\Domains\ContactActivity\Models\Traits\Relationship;

/**
 * Trait ContactActivityRelationship.
 */
trait ContactActivityRelationship
{



       /**
    * Get  the Contact that owns the ContactActivity.
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function contact() {
        return $this->belongsTo(Contact::class,'contact_id');
    }
       /**
    * Get  the Type that owns the ContactActivity.
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function type() {
        return $this->belongsTo(Type::class,'type_id');
    }
       /**
    * Get  the Outcome that owns the ContactActivity.
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function outcome() {
        return $this->belongsTo(Outcome::class,'outcome_id');
    }

}