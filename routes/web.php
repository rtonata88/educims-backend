<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicYearsController;
use App\Http\Controllers\CampusesController;
use App\Http\Controllers\FacultiesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ExamTypesController;
use App\Http\Controllers\GradingScalesController;
use App\Http\Controllers\StudyModesController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\StudyPeriodsController;
use App\Http\Controllers\QualificationLevelsController;
use App\Http\Controllers\ModulePaperSubminimumsController;
use App\Http\Controllers\ExamPapersController;
use App\Http\Controllers\QualificationsController;
use App\Http\Controllers\QualificationTypesController;
use App\Http\Controllers\QualificationCampusesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'academic_years',
], function () {
    Route::get('/', [AcademicYearsController::class, 'index'])
         ->name('academic_years.academic_year.index');
    Route::get('/create', [AcademicYearsController::class, 'create'])
         ->name('academic_years.academic_year.create');
    Route::get('/show/{academicYear}',[AcademicYearsController::class, 'show'])
         ->name('academic_years.academic_year.show')->where('id', '[0-9]+');
    Route::get('/{academicYear}/edit',[AcademicYearsController::class, 'edit'])
         ->name('academic_years.academic_year.edit')->where('id', '[0-9]+');
    Route::post('/', [AcademicYearsController::class, 'store'])
         ->name('academic_years.academic_year.store');
    Route::put('academic_year/{academicYear}', [AcademicYearsController::class, 'update'])
         ->name('academic_years.academic_year.update')->where('id', '[0-9]+');
    Route::delete('/academic_year/{academicYear}',[AcademicYearsController::class, 'destroy'])
         ->name('academic_years.academic_year.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'campuses',
], function () {
    Route::get('/', [CampusesController::class, 'index'])
         ->name('campuses.campus.index');
    Route::get('/create', [CampusesController::class, 'create'])
         ->name('campuses.campus.create');
    Route::get('/show/{campus}',[CampusesController::class, 'show'])
         ->name('campuses.campus.show')->where('id', '[0-9]+');
    Route::get('/{campus}/edit',[CampusesController::class, 'edit'])
         ->name('campuses.campus.edit')->where('id', '[0-9]+');
    Route::post('/', [CampusesController::class, 'store'])
         ->name('campuses.campus.store');
    Route::put('campus/{campus}', [CampusesController::class, 'update'])
         ->name('campuses.campus.update')->where('id', '[0-9]+');
    Route::delete('/campus/{campus}',[CampusesController::class, 'destroy'])
         ->name('campuses.campus.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'faculties',
], function () {
    Route::get('/', [FacultiesController::class, 'index'])
         ->name('faculties.faculty.index');
    Route::get('/create', [FacultiesController::class, 'create'])
         ->name('faculties.faculty.create');
    Route::get('/show/{faculty}',[FacultiesController::class, 'show'])
         ->name('faculties.faculty.show')->where('id', '[0-9]+');
    Route::get('/{faculty}/edit',[FacultiesController::class, 'edit'])
         ->name('faculties.faculty.edit')->where('id', '[0-9]+');
    Route::post('/', [FacultiesController::class, 'store'])
         ->name('faculties.faculty.store');
    Route::put('faculty/{faculty}', [FacultiesController::class, 'update'])
         ->name('faculties.faculty.update')->where('id', '[0-9]+');
    Route::delete('/faculty/{faculty}',[FacultiesController::class, 'destroy'])
         ->name('faculties.faculty.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'departments',
], function () {
    Route::get('/', [DepartmentsController::class, 'index'])
         ->name('departments.department.index');
    Route::get('/create', [DepartmentsController::class, 'create'])
         ->name('departments.department.create');
    Route::get('/show/{department}',[DepartmentsController::class, 'show'])
         ->name('departments.department.show')->where('id', '[0-9]+');
    Route::get('/{department}/edit',[DepartmentsController::class, 'edit'])
         ->name('departments.department.edit')->where('id', '[0-9]+');
    Route::post('/', [DepartmentsController::class, 'store'])
         ->name('departments.department.store');
    Route::put('department/{department}', [DepartmentsController::class, 'update'])
         ->name('departments.department.update')->where('id', '[0-9]+');
    Route::delete('/department/{department}',[DepartmentsController::class, 'destroy'])
         ->name('departments.department.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'exam_types',
], function () {
    Route::get('/', [ExamTypesController::class, 'index'])
         ->name('exam_types.exam_type.index');
    Route::get('/create', [ExamTypesController::class, 'create'])
         ->name('exam_types.exam_type.create');
    Route::get('/show/{examType}',[ExamTypesController::class, 'show'])
         ->name('exam_types.exam_type.show')->where('id', '[0-9]+');
    Route::get('/{examType}/edit',[ExamTypesController::class, 'edit'])
         ->name('exam_types.exam_type.edit')->where('id', '[0-9]+');
    Route::post('/', [ExamTypesController::class, 'store'])
         ->name('exam_types.exam_type.store');
    Route::put('exam_type/{examType}', [ExamTypesController::class, 'update'])
         ->name('exam_types.exam_type.update')->where('id', '[0-9]+');
    Route::delete('/exam_type/{examType}',[ExamTypesController::class, 'destroy'])
         ->name('exam_types.exam_type.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'grading_scales',
], function () {
    Route::get('/', [GradingScalesController::class, 'index'])
         ->name('grading_scales.grading_scale.index');
    Route::get('/create', [GradingScalesController::class, 'create'])
         ->name('grading_scales.grading_scale.create');
    Route::get('/show/{gradingScale}',[GradingScalesController::class, 'show'])
         ->name('grading_scales.grading_scale.show')->where('id', '[0-9]+');
    Route::get('/{gradingScale}/edit',[GradingScalesController::class, 'edit'])
         ->name('grading_scales.grading_scale.edit')->where('id', '[0-9]+');
    Route::post('/', [GradingScalesController::class, 'store'])
         ->name('grading_scales.grading_scale.store');
    Route::put('grading_scale/{gradingScale}', [GradingScalesController::class, 'update'])
         ->name('grading_scales.grading_scale.update')->where('id', '[0-9]+');
    Route::delete('/grading_scale/{gradingScale}',[GradingScalesController::class, 'destroy'])
         ->name('grading_scales.grading_scale.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'study_modes',
], function () {
    Route::get('/', [StudyModesController::class, 'index'])
         ->name('study_modes.study_mode.index');
    Route::get('/create', [StudyModesController::class, 'create'])
         ->name('study_modes.study_mode.create');
    Route::get('/show/{studyMode}',[StudyModesController::class, 'show'])
         ->name('study_modes.study_mode.show')->where('id', '[0-9]+');
    Route::get('/{studyMode}/edit',[StudyModesController::class, 'edit'])
         ->name('study_modes.study_mode.edit')->where('id', '[0-9]+');
    Route::post('/', [StudyModesController::class, 'store'])
         ->name('study_modes.study_mode.store');
    Route::put('study_mode/{studyMode}', [StudyModesController::class, 'update'])
         ->name('study_modes.study_mode.update')->where('id', '[0-9]+');
    Route::delete('/study_mode/{studyMode}',[StudyModesController::class, 'destroy'])
         ->name('study_modes.study_mode.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'modules',
], function () {
    Route::get('/', [ModulesController::class, 'index'])
         ->name('modules.module.index');
    Route::get('/create', [ModulesController::class, 'create'])
         ->name('modules.module.create');
    Route::get('/show/{module}',[ModulesController::class, 'show'])
         ->name('modules.module.show')->where('id', '[0-9]+');
    Route::get('/{module}/edit',[ModulesController::class, 'edit'])
         ->name('modules.module.edit')->where('id', '[0-9]+');
    Route::post('/', [ModulesController::class, 'store'])
         ->name('modules.module.store');
    Route::put('module/{module}', [ModulesController::class, 'update'])
         ->name('modules.module.update')->where('id', '[0-9]+');
    Route::delete('/module/{module}',[ModulesController::class, 'destroy'])
         ->name('modules.module.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'study_periods',
], function () {
    Route::get('/', [StudyPeriodsController::class, 'index'])
         ->name('study_periods.study_period.index');
    Route::get('/create', [StudyPeriodsController::class, 'create'])
         ->name('study_periods.study_period.create');
    Route::get('/show/{studyPeriod}',[StudyPeriodsController::class, 'show'])
         ->name('study_periods.study_period.show')->where('id', '[0-9]+');
    Route::get('/{studyPeriod}/edit',[StudyPeriodsController::class, 'edit'])
         ->name('study_periods.study_period.edit')->where('id', '[0-9]+');
    Route::post('/', [StudyPeriodsController::class, 'store'])
         ->name('study_periods.study_period.store');
    Route::put('study_period/{studyPeriod}', [StudyPeriodsController::class, 'update'])
         ->name('study_periods.study_period.update')->where('id', '[0-9]+');
    Route::delete('/study_period/{studyPeriod}',[StudyPeriodsController::class, 'destroy'])
         ->name('study_periods.study_period.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'qualification_levels',
], function () {
    Route::get('/', [QualificationLevelsController::class, 'index'])
         ->name('qualification_levels.qualification_level.index');
    Route::get('/create', [QualificationLevelsController::class, 'create'])
         ->name('qualification_levels.qualification_level.create');
    Route::get('/show/{qualificationLevel}',[QualificationLevelsController::class, 'show'])
         ->name('qualification_levels.qualification_level.show')->where('id', '[0-9]+');
    Route::get('/{qualificationLevel}/edit',[QualificationLevelsController::class, 'edit'])
         ->name('qualification_levels.qualification_level.edit')->where('id', '[0-9]+');
    Route::post('/', [QualificationLevelsController::class, 'store'])
         ->name('qualification_levels.qualification_level.store');
    Route::put('qualification_level/{qualificationLevel}', [QualificationLevelsController::class, 'update'])
         ->name('qualification_levels.qualification_level.update')->where('id', '[0-9]+');
    Route::delete('/qualification_level/{qualificationLevel}',[QualificationLevelsController::class, 'destroy'])
         ->name('qualification_levels.qualification_level.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'module_paper_subminimums',
], function () {
    Route::get('/', [ModulePaperSubminimumsController::class, 'index'])
         ->name('module_paper_subminimums.module_paper_subminimum.index');
    Route::get('/create', [ModulePaperSubminimumsController::class, 'create'])
         ->name('module_paper_subminimums.module_paper_subminimum.create');
    Route::get('/show/{modulePaperSubminimum}',[ModulePaperSubminimumsController::class, 'show'])
         ->name('module_paper_subminimums.module_paper_subminimum.show')->where('id', '[0-9]+');
    Route::get('/{modulePaperSubminimum}/edit',[ModulePaperSubminimumsController::class, 'edit'])
         ->name('module_paper_subminimums.module_paper_subminimum.edit')->where('id', '[0-9]+');
    Route::post('/', [ModulePaperSubminimumsController::class, 'store'])
         ->name('module_paper_subminimums.module_paper_subminimum.store');
    Route::put('module_paper_subminimum/{modulePaperSubminimum}', [ModulePaperSubminimumsController::class, 'update'])
         ->name('module_paper_subminimums.module_paper_subminimum.update')->where('id', '[0-9]+');
    Route::delete('/module_paper_subminimum/{modulePaperSubminimum}',[ModulePaperSubminimumsController::class, 'destroy'])
         ->name('module_paper_subminimums.module_paper_subminimum.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'exam_papers',
], function () {
    Route::get('/', [ExamPapersController::class, 'index'])
         ->name('exam_papers.exam_paper.index');
    Route::get('/create', [ExamPapersController::class, 'create'])
         ->name('exam_papers.exam_paper.create');
    Route::get('/show/{examPaper}',[ExamPapersController::class, 'show'])
         ->name('exam_papers.exam_paper.show')->where('id', '[0-9]+');
    Route::get('/{examPaper}/edit',[ExamPapersController::class, 'edit'])
         ->name('exam_papers.exam_paper.edit')->where('id', '[0-9]+');
    Route::post('/', [ExamPapersController::class, 'store'])
         ->name('exam_papers.exam_paper.store');
    Route::put('exam_paper/{examPaper}', [ExamPapersController::class, 'update'])
         ->name('exam_papers.exam_paper.update')->where('id', '[0-9]+');
    Route::delete('/exam_paper/{examPaper}',[ExamPapersController::class, 'destroy'])
         ->name('exam_papers.exam_paper.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'qualifications',
], function () {
    Route::get('/', [QualificationsController::class, 'index'])
         ->name('qualifications.qualification.index');
    Route::get('/create', [QualificationsController::class, 'create'])
         ->name('qualifications.qualification.create');
    Route::get('/show/{qualification}',[QualificationsController::class, 'show'])
         ->name('qualifications.qualification.show')->where('id', '[0-9]+');
    Route::get('/{qualification}/edit',[QualificationsController::class, 'edit'])
         ->name('qualifications.qualification.edit')->where('id', '[0-9]+');
    Route::post('/', [QualificationsController::class, 'store'])
         ->name('qualifications.qualification.store');
    Route::put('qualification/{qualification}', [QualificationsController::class, 'update'])
         ->name('qualifications.qualification.update')->where('id', '[0-9]+');
    Route::delete('/qualification/{qualification}',[QualificationsController::class, 'destroy'])
         ->name('qualifications.qualification.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'qualification_types',
], function () {
    Route::get('/', [QualificationTypesController::class, 'index'])
         ->name('qualification_types.qualification_type.index');
    Route::get('/create', [QualificationTypesController::class, 'create'])
         ->name('qualification_types.qualification_type.create');
    Route::get('/show/{qualificationType}',[QualificationTypesController::class, 'show'])
         ->name('qualification_types.qualification_type.show')->where('id', '[0-9]+');
    Route::get('/{qualificationType}/edit',[QualificationTypesController::class, 'edit'])
         ->name('qualification_types.qualification_type.edit')->where('id', '[0-9]+');
    Route::post('/', [QualificationTypesController::class, 'store'])
         ->name('qualification_types.qualification_type.store');
    Route::put('qualification_type/{qualificationType}', [QualificationTypesController::class, 'update'])
         ->name('qualification_types.qualification_type.update')->where('id', '[0-9]+');
    Route::delete('/qualification_type/{qualificationType}',[QualificationTypesController::class, 'destroy'])
         ->name('qualification_types.qualification_type.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'qualification_campuses',
], function () {
    Route::get('/', [QualificationCampusesController::class, 'index'])
         ->name('qualification_campuses.qualification_campus.index');
    Route::get('/create', [QualificationCampusesController::class, 'create'])
         ->name('qualification_campuses.qualification_campus.create');
    Route::get('/show/{qualificationCampus}',[QualificationCampusesController::class, 'show'])
         ->name('qualification_campuses.qualification_campus.show')->where('id', '[0-9]+');
    Route::get('/{qualificationCampus}/edit',[QualificationCampusesController::class, 'edit'])
         ->name('qualification_campuses.qualification_campus.edit')->where('id', '[0-9]+');
    Route::post('/', [QualificationCampusesController::class, 'store'])
         ->name('qualification_campuses.qualification_campus.store');
    Route::put('qualification_campus/{qualificationCampus}', [QualificationCampusesController::class, 'update'])
         ->name('qualification_campuses.qualification_campus.update')->where('id', '[0-9]+');
    Route::delete('/qualification_campus/{qualificationCampus}',[QualificationCampusesController::class, 'destroy'])
         ->name('qualification_campuses.qualification_campus.destroy')->where('id', '[0-9]+');
});
