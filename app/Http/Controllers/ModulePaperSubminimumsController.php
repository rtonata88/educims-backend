<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ExamType;
use App\Models\Module;
use App\Models\ModulePaperSubminimum;
use App\Models\Paper;
use Illuminate\Http\Request;
use Exception;

class ModulePaperSubminimumsController extends Controller
{

    /**
     * Display a listing of the module paper subminimums.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $modulePaperSubminimums = ModulePaperSubminimum::with('academicyear','module','examtype','paper')->paginate(25);

        return view('module_paper_subminimums.index', compact('modulePaperSubminimums'));
    }

    /**
     * Show the form for creating a new module paper subminimum.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $academicYears = AcademicYear::pluck('academic_year','id')->all();
$modules = Module::pluck('module_code','id')->all();
$examTypes = ExamType::pluck('exam_type_code','id')->all();
$papers = Paper::pluck('id','id')->all();
        
        return view('module_paper_subminimums.create', compact('academicYears','modules','examTypes','papers'));
    }

    /**
     * Store a new module paper subminimum in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ModulePaperSubminimum::create($data);

            return redirect()->route('module_paper_subminimums.module_paper_subminimum.index')
                ->with('success_message', 'Module Paper Subminimum was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified module paper subminimum.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $modulePaperSubminimum = ModulePaperSubminimum::with('academicyear','module','examtype','paper')->findOrFail($id);

        return view('module_paper_subminimums.show', compact('modulePaperSubminimum'));
    }

    /**
     * Show the form for editing the specified module paper subminimum.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $modulePaperSubminimum = ModulePaperSubminimum::findOrFail($id);
        $academicYears = AcademicYear::pluck('academic_year','id')->all();
$modules = Module::pluck('module_code','id')->all();
$examTypes = ExamType::pluck('exam_type_code','id')->all();
$papers = Paper::pluck('id','id')->all();

        return view('module_paper_subminimums.edit', compact('modulePaperSubminimum','academicYears','modules','examTypes','papers'));
    }

    /**
     * Update the specified module paper subminimum in the storage.
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
            
            $modulePaperSubminimum = ModulePaperSubminimum::findOrFail($id);
            $modulePaperSubminimum->update($data);

            return redirect()->route('module_paper_subminimums.module_paper_subminimum.index')
                ->with('success_message', 'Module Paper Subminimum was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified module paper subminimum from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $modulePaperSubminimum = ModulePaperSubminimum::findOrFail($id);
            $modulePaperSubminimum->delete();

            return redirect()->route('module_paper_subminimums.module_paper_subminimum.index')
                ->with('success_message', 'Module Paper Subminimum was successfully deleted.');
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
            'module_id' => 'nullable',
            'exam_type_id' => 'nullable',
            'paper_id' => 'nullable',
            'subminimum_mark' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
