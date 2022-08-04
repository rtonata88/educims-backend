<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudyPeriod;
use Illuminate\Http\Request;
use Exception;

class StudyPeriodsController extends Controller
{

    /**
     * Display a listing of the study periods.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $studyPeriods = StudyPeriod::paginate(25);

        return view('study_periods.index', compact('studyPeriods'));
    }

    /**
     * Show the form for creating a new study period.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('study_periods.create');
    }

    /**
     * Store a new study period in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            StudyPeriod::create($data);

            return redirect()->route('study_periods.study_period.index')
                ->with('success_message', 'Study Period was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified study period.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $studyPeriod = StudyPeriod::findOrFail($id);

        return view('study_periods.show', compact('studyPeriod'));
    }

    /**
     * Show the form for editing the specified study period.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $studyPeriod = StudyPeriod::findOrFail($id);
        

        return view('study_periods.edit', compact('studyPeriod'));
    }

    /**
     * Update the specified study period in the storage.
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
            
            $studyPeriod = StudyPeriod::findOrFail($id);
            $studyPeriod->update($data);

            return redirect()->route('study_periods.study_period.index')
                ->with('success_message', 'Study Period was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified study period from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $studyPeriod = StudyPeriod::findOrFail($id);
            $studyPeriod->delete();

            return redirect()->route('study_periods.study_period.index')
                ->with('success_message', 'Study Period was successfully deleted.');
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
                'period_code' => 'string|min:1|nullable',
            'period_name' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
