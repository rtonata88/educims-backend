<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudyMode;
use Illuminate\Http\Request;
use Exception;

class StudyModesController extends Controller
{

    /**
     * Display a listing of the study modes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $studyModes = StudyMode::paginate(25);

        return view('study_modes.index', compact('studyModes'));
    }

    /**
     * Show the form for creating a new study mode.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('study_modes.create');
    }

    /**
     * Store a new study mode in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            StudyMode::create($data);

            return redirect()->route('study_modes.study_mode.index')
                ->with('success_message', 'Study Mode was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified study mode.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $studyMode = StudyMode::findOrFail($id);

        return view('study_modes.show', compact('studyMode'));
    }

    /**
     * Show the form for editing the specified study mode.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $studyMode = StudyMode::findOrFail($id);
        

        return view('study_modes.edit', compact('studyMode'));
    }

    /**
     * Update the specified study mode in the storage.
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
            
            $studyMode = StudyMode::findOrFail($id);
            $studyMode->update($data);

            return redirect()->route('study_modes.study_mode.index')
                ->with('success_message', 'Study Mode was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified study mode from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $studyMode = StudyMode::findOrFail($id);
            $studyMode->delete();

            return redirect()->route('study_modes.study_mode.index')
                ->with('success_message', 'Study Mode was successfully deleted.');
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
                'study_mode_code' => 'string|min:1|nullable',
            'study_mode_name' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
