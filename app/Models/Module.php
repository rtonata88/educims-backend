<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';

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
                  'module_code',
                  'module_name',
                  'module_year_level',
                  'department_id',
                  'credits',
                  'has_practical',
                  'nqflevel',
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
     * Get the department for this model.
     *
     * @return App\Models\Department
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department','department_id');
    }



}
