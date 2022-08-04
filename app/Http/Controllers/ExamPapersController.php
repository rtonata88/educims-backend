<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExamPaper;
use Illuminate\Http\Request;
use Exception;

class ExamPapersController extends Controller
{

    /**
     * Display a listing of the exam papers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $examPapers = ExamPaper::paginate(25);

        return view('exam_papers.index', compact('examPapers'));
    }

    /**
     * Show the form for creating a new exam paper.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('exam_papers.create');
    }

    /**
     * Store a new exam paper in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ExamPaper::create($data);

            return redirect()->route('exam_papers.exam_paper.index')
                ->with('success_message', 'Exam Paper was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified exam paper.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $examPaper = ExamPaper::findOrFail($id);

        return view('exam_papers.show', compact('examPaper'));
    }

    /**
     * Show the form for editing the specified exam paper.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $examPaper = ExamPaper::findOrFail($id);
        

        return view('exam_papers.edit', compact('examPaper'));
    }

    /**
     * Update the specified exam paper in the storage.
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
            
            $examPaper = ExamPaper::findOrFail($id);
            $examPaper->update($data);

            return redirect()->route('exam_papers.exam_paper.index')
                ->with('success_message', 'Exam Paper was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified exam paper from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $examPaper = ExamPaper::findOrFail($id);
            $examPaper->delete();

            return redirect()->route('exam_papers.exam_paper.index')
                ->with('success_message', 'Exam Paper was successfully deleted.');
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
                'paper_name' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
