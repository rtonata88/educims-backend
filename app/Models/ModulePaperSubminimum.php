<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModulePaperSubminimum extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_paper_subminimums';

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
                  'module_id',
                  'exam_type_id',
                  'paper_id',
                  'subminimum_mark'
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
     * Get the module for this model.
     *
     * @return App\Models\Module
     */
    public function module()
    {
        return $this->belongsTo('App\Models\Module','module_id');
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

    /**
     * Get the paper for this model.
     *
     * @return App\Models\Paper
     */
    public function paper()
    {
        return $this->belongsTo('App\Models\Paper','paper_id');
    }



}
