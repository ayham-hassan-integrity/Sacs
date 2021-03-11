<?php

namespace App\Domains\Outcome\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Outcome\Models\Traits\Attribute\OutcomeAttribute;
use App\Domains\Outcome\Models\Traits\Method\OutcomeMethod;
use App\Domains\Outcome\Models\Traits\Relationship\OutcomeRelationship;
use App\Domains\Outcome\Models\Traits\Scope\OutcomeScope;


/**
 * Class Outcome.
 */
class Outcome extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        OutcomeAttribute,
        OutcomeMethod,
        OutcomeRelationship,
        OutcomeScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'outcomes';

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