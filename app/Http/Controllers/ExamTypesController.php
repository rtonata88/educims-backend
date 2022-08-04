<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;
use Exception;

class ExamTypesController extends Controller
{

    /**
     * Display a listing of the exam types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $examTypes = ExamType::paginate(25);

        return view('exam_types.index', compact('examTypes'));
    }

    /**
     * Show the form for creating a new exam type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('exam_types.create');
    }

    /**
     * Store a new exam type in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ExamType::create($data);

            return redirect()->route('exam_types.exam_type.index')
                ->with('success_message', 'Exam Type was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified exam type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $examType = ExamType::findOrFail($id);

        return view('exam_types.show', compact('examType'));
    }

    /**
     * Show the form for editing the specified exam type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $examType = ExamType::findOrFail($id);
        

        return view('exam_types.edit', compact('examType'));
    }

    /**
     * Update the specified exam type in the storage.
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
            
            $examType = ExamType::findOrFail($id);
            $examType->update($data);

            return redirect()->route('exam_types.exam_type.index')
                ->with('success_message', 'Exam Type was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified exam type from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $examType = ExamType::findOrFail($id);
            $examType->delete();

            return redirect()->route('exam_types.exam_type.index')
                ->with('success_message', 'Exam Type was successfully deleted.');
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
                'exam_type_code' => 'string|min:1|nullable',
            'exam_type_name' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
