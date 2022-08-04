<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campuses';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'campus_name',
                  'postal_address',
                  'physical_address',
                  'contact_number',
                  'contact_person',
                  'is_active'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
               'deleted_at'
           ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    



}
