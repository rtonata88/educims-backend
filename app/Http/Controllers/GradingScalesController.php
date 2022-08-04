<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ExamType;
use App\Models\GradingScale;
use Illuminate\Http\Request;
use Exception;

class GradingScalesController extends Controller
{

    /**
     * Display a listing of the grading scales.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $gradingScales = GradingScale::with('academicyear','examtype')->paginate(25);

        return view('grading_scales.index', compact('gradingScales'));
    }

    /**
     * Show the form for creating a new grading scale.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $academicYears = AcademicYear::pluck('academic_year','id')->all();
$examTypes = ExamType::pluck('exam_type_code','id')->all();
        
        return view('grading_scales.create', compact('academicYears','examTypes'));
    }

    /**
     * Store a new grading scale in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            GradingScale::create($data);

            return redirect()->route('grading_scales.grading_scale.index')
                ->with('success_message', 'Grading Scale was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified grading scale.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $gradingScale = GradingScale::with('academicyear','examtype')->findOrFail($id);

        return view('grading_scales.show', compact('gradingScale'));
    }

    /**
     * Show the form for editing the specified grading scale.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $gradingScale = GradingScale::findOrFail($id);
        $academicYears = AcademicYear::pluck('academic_year','id')->all();
$examTypes = ExamType::pluck('exam_type_code','id')->all();

        return view('grading_scales.edit', compact('gradingScale','academicYears','examTypes'));
    }

    /**
     * Update the specified grading scale in the storage.
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
            
            $gradingScale = GradingScale::findOrFail($id);
            $gradingScale->update($data);

            return redirect()->route('grading_scales.grading_scale.index')
                ->with('success_message', 'Grading Scale was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified grading scale from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $gradingScale = GradingScale::findOrFail($id);
            $gradingScale->delete();

            return redirect()->route('grading_scales.grading_scale.index')
                ->with('success_message', 'Grading Scale was successfully deleted.');
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
            'exam_type_id' => 'nullable',
            'symbol' => 'string|min:1|nullable',
            'minimum_mark' => 'string|min:1|nullable',
            'maximum_mark' => 'string|min:1|nullable',
            'academic_result' => 'string|min:1|nullable',
            'result_description' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
