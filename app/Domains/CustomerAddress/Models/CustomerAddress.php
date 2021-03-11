<?php

namespace App\Domains\CustomerAddress\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\CustomerAddress\Models\Traits\Attribute\CustomerAddressAttribute;
use App\Domains\CustomerAddress\Models\Traits\Method\CustomerAddressMethod;
use App\Domains\CustomerAddress\Models\Traits\Relationship\CustomerAddressRelationship;
use App\Domains\CustomerAddress\Models\Traits\Scope\CustomerAddressScope;


/**
 * Class CustomerAddress.
 */
class CustomerAddress extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        CustomerAddressAttribute,
        CustomerAddressMethod,
        CustomerAddressRelationship,
        CustomerAddressScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'customer_addresses';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "customer_id",        "address_id",        "rec_date",        "details",    ];

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
    "rec_date",
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