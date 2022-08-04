<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QualificationType;
use Illuminate\Http\Request;
use Exception;

class QualificationTypesController extends Controller
{

    /**
     * Display a listing of the qualification types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $qualificationTypes = QualificationType::paginate(25);

        return view('qualification_types.index', compact('qualificationTypes'));
    }

    /**
     * Show the form for creating a new qualification type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('qualification_types.create');
    }

    /**
     * Store a new qualification type in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            QualificationType::create($data);

            return redirect()->route('qualification_types.qualification_type.index')
                ->with('success_message', 'Qualification Type was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified qualification type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $qualificationType = QualificationType::findOrFail($id);

        return view('qualification_types.show', compact('qualificationType'));
    }

    /**
     * Show the form for editing the specified qualification type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $qualificationType = QualificationType::findOrFail($id);
        

        return view('qualification_types.edit', compact('qualificationType'));
    }

    /**
     * Update the specified qualification type in the storage.
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
            
            $qualificationType = QualificationType::findOrFail($id);
            $qualificationType->update($data);

            return redirect()->route('qualification_types.qualification_type.index')
                ->with('success_message', 'Qualification Type was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified qualification type from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $qualificationType = QualificationType::findOrFail($id);
            $qualificationType->delete();

            return redirect()->route('qualification_types.qualification_type.index')
                ->with('success_message', 'Qualification Type was successfully deleted.');
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
                'qualification_type' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
