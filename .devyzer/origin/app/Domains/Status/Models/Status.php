<?php

namespace App\Domains\Status\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Status\Models\Traits\Attribute\StatusAttribute;
use App\Domains\Status\Models\Traits\Method\StatusMethod;
use App\Domains\Status\Models\Traits\Relationship\StatusRelationship;
use App\Domains\Status\Models\Traits\Scope\StatusScope;


/**
 * Class Status.
 */
class Status extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        StatusAttribute,
        StatusMethod,
        StatusRelationship,
        StatusScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'status';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "code",        "description",    ];

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