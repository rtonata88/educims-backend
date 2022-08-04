<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QualificationCampus extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qualification_campuses';

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
                  'academic_year_id',
                  'qualification_id',
                  'study_mode_id',
                  'campus_id'
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
     * Get the academicYear for this model.
     *
     * @return App\Models\AcademicYear
     */
    public function academicYear()
    {
        return $this->belongsTo('App\Models\AcademicYear','academic_year_id');
    }

    /**
     * Get the qualification for this model.
     *
     * @return App\Models\Qualification
     */
    public function qualification()
    {
        return $this->belongsTo('App\Models\Qualification','qualification_id');
    }

    /**
     * Get the studyMode for this model.
     *
     * @return App\Models\StudyMode
     */
    public function studyMode()
    {
        return $this->belongsTo('App\Models\StudyMode','study_mode_id');
    }

    /**
     * Get the campus for this model.
     *
     * @return App\Models\Campus
     */
    public function campus()
    {
        return $this->belongsTo('App\Models\Campus','campus_id');
    }



}
