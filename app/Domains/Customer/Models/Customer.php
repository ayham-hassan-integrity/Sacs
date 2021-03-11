<?php

namespace App\Domains\Customer\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Customer\Models\Traits\Attribute\CustomerAttribute;
use App\Domains\Customer\Models\Traits\Method\CustomerMethod;
use App\Domains\Customer\Models\Traits\Relationship\CustomerRelationship;
use App\Domains\Customer\Models\Traits\Scope\CustomerScope;


/**
 * Class Customer.
 */
class Customer extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        CustomerAttribute,
        CustomerMethod,
        CustomerRelationship,
        CustomerScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'customers';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "name",        "coming_date",        "details",    ];

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
    "coming_date",
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