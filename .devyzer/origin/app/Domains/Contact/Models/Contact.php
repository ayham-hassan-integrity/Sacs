<?php

namespace App\Domains\Contact\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Contact\Models\Traits\Attribute\ContactAttribute;
use App\Domains\Contact\Models\Traits\Method\ContactMethod;
use App\Domains\Contact\Models\Traits\Relationship\ContactRelationship;
use App\Domains\Contact\Models\Traits\Scope\ContactScope;


/**
 * Class Contact.
 */
class Contact extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        ContactAttribute,
        ContactMethod,
        ContactRelationship,
        ContactScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'contacts';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "image",        "name",        "customer_id",        "status_id",        "email",        "web_sit",        "phone",        "mobile",        "fax",        "details",    ];

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