<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradingScale extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grading_scales';

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
                  'exam_type_id',
                  'symbol',
                  'minimum_mark',
                  'maximum_mark',
                  'academic_result',
                  'result_description'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
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
     * Get the examType for this model.
     *
     * @return App\Models\ExamType
     */
    public function examType()
    {
        return $this->belongsTo('App\Models\ExamType','exam_type_id');
    }



}
