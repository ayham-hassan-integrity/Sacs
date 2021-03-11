<?php

namespace App\Domains\ContactActivity\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\ContactActivity\Models\Traits\Attribute\ContactActivityAttribute;
use App\Domains\ContactActivity\Models\Traits\Method\ContactActivityMethod;
use App\Domains\ContactActivity\Models\Traits\Relationship\ContactActivityRelationship;
use App\Domains\ContactActivity\Models\Traits\Scope\ContactActivityScope;


/**
 * Class ContactActivity.
 */
class ContactActivity extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        ContactActivityAttribute,
        ContactActivityMethod,
        ContactActivityRelationship,
        ContactActivityScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'contact_activities';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "contact_id",        "type_id",        "outcome_id",        "activity_date",        "details",    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public $timestamps =["create_at","update_at"];

    /**
     * @var array
     */
    protected $dates = [
    "deleted_at",
    "create_at",
    "update_at",
    "activity_date",
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

}