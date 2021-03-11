<?php

namespace App\Domains\Type\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Type\Models\Traits\Attribute\TypeAttribute;
use App\Domains\Type\Models\Traits\Method\TypeMethod;
use App\Domains\Type\Models\Traits\Relationship\TypeRelationship;
use App\Domains\Type\Models\Traits\Scope\TypeScope;


/**
 * Class Type.
 */
class Type extends Model
{
    use Eventually,
        RecordableTrait,
        SoftDeletes,
        TypeAttribute,
        TypeMethod,
        TypeRelationship,
        TypeScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'types';

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