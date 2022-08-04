<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QualificationLevel;
use Illuminate\Http\Request;
use Exception;

class QualificationLevelsController extends Controller
{

    /**
     * Display a listing of the qualification levels.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $qualificationLevels = QualificationLevel::paginate(25);

        return view('qualification_levels.index', compact('qualificationLevels'));
    }

    /**
     * Show the form for creating a new qualification level.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('qualification_levels.create');
    }

    /**
     * Store a new qualification level in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            QualificationLevel::create($data);

            return redirect()->route('qualification_levels.qualification_level.index')
                ->with('success_message', 'Qualification Level was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified qualification level.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $qualificationLevel = QualificationLevel::findOrFail($id);

        return view('qualification_levels.show', compact('qualificationLevel'));
    }

    /**
     * Show the form for editing the specified qualification level.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $qualificationLevel = QualificationLevel::findOrFail($id);
        

        return view('qualification_levels.edit', compact('qualificationLevel'));
    }

    /**
     * Update the specified qualification level in the storage.
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
            
            $qualificationLevel = QualificationLevel::findOrFail($id);
            $qualificationLevel->update($data);

            return redirect()->route('qualification_levels.qualification_level.index')
                ->with('success_message', 'Qualification Level was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified qualification level from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $qualificationLevel = QualificationLevel::findOrFail($id);
            $qualificationLevel->delete();

            return redirect()->route('qualification_levels.qualification_level.index')
                ->with('success_message', 'Qualification Level was successfully deleted.');
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
                'qualification_level' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
