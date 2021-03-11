<?php

namespace App\Domains\Address\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Address\Models\Traits\Attribute\AddressAttribute;
use App\Domains\Address\Models\Traits\Method\AddressMethod;
use App\Domains\Address\Models\Traits\Relationship\AddressRelationship;
use App\Domains\Address\Models\Traits\Scope\AddressScope;


/**
 * Class Address.
 */
class Address extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        AddressAttribute,
        AddressMethod,
        AddressRelationship,
        AddressScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'addresses';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "build_num",        "street",        "area",        "city",        "zipcode",        "country",        "details",    ];

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