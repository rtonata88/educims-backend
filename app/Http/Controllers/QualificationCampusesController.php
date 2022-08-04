<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Campus;
use App\Models\Qualification;
use App\Models\QualificationCampus;
use App\Models\StudyMode;
use Illuminate\Http\Request;
use Exception;

class QualificationCampusesController extends Controller
{

    /**
     * Display a listing of the qualification campuses.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $qualificationCampuses = QualificationCampus::with('academicyear','qualification','studymode','campus')->paginate(25);

        return view('qualification_campuses.index', compact('qualificationCampuses'));
    }

    /**
     * Show the form for creating a new qualification campus.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $academicYears = AcademicYear::pluck('academic_year','id')->all();
$qualifications = Qualification::pluck('qualification_code','id')->all();
$studyModes = StudyMode::pluck('study_mode_code','id')->all();
$campuses = Campus::pluck('campus_name','id')->all();
        
        return view('qualification_campuses.create', compact('academicYears','qualifications','studyModes','campuses'));
    }

    /**
     * Store a new qualification campus in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            QualificationCampus::create($data);

            return redirect()->route('qualification_campuses.qualification_campus.index')
                ->with('success_message', 'Qualification Campus was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified qualification campus.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $qualificationCampus = QualificationCampus::with('academicyear','qualification','studymode','campus')->findOrFail($id);

        return view('qualification_campuses.show', compact('qualificationCampus'));
    }

    /**
     * Show the form for editing the specified qualification campus.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $qualificationCampus = QualificationCampus::findOrFail($id);
        $academicYears = AcademicYear::pluck('academic_year','id')->all();
$qualifications = Qualification::pluck('qualification_code','id')->all();
$studyModes = StudyMode::pluck('study_mode_code','id')->all();
$campuses = Campus::pluck('campus_name','id')->all();

        return view('qualification_campuses.edit', compact('qualificationCampus','academicYears','qualifications','studyModes','campuses'));
    }

    /**
     * Update the specified qualification campus in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $qualificationCampus = QualificationCampus::findOrFail($id);
            $qualificationCampus->update($data);

            return redirect()->route('qualification_campuses.qualification_campus.index')
                ->with('success_message', 'Qualification Campus was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified qualification campus from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $qualificationCampus = QualificationCampus::findOrFail($id);
            $qualificationCampus->delete();

            return redirect()->route('qualification_campuses.qualification_campus.index')
                ->with('success_message', 'Qualification Campus was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'academic_year_id' => 'nullable',
            'qualification_id' => 'nullable',
            'study_mode_id' => 'nullable',
            'campus_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
