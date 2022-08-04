<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qualifications';

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
                  'qualification_code',
                  'qualification_name',
                  'number_of_years',
                  'department_code',
                  'qualification_type_id',
                  'qualification_level',
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
    
    /**
     * Get the qualificationType for this model.
     *
     * @return App\Models\QualificationType
     */
    public function qualificationType()
    {
        return $this->belongsTo('App\Models\QualificationType','qualification_type_id');
    }



}
