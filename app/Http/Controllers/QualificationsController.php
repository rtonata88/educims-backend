<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use App\Models\QualificationType;
use Illuminate\Http\Request;
use Exception;

class QualificationsController extends Controller
{

    /**
     * Display a listing of the qualifications.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $qualifications = Qualification::with('qualificationtype')->paginate(25);

        return view('qualifications.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new qualification.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $qualificationTypes = QualificationType::pluck('id','id')->all();
        
        return view('qualifications.create', compact('qualificationTypes'));
    }

    /**
     * Store a new qualification in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Qualification::create($data);

            return redirect()->route('qualifications.qualification.index')
                ->with('success_message', 'Qualification was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified qualification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $qualification = Qualification::with('qualificationtype')->findOrFail($id);

        return view('qualifications.show', compact('qualification'));
    }

    /**
     * Show the form for editing the specified qualification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $qualification = Qualification::findOrFail($id);
        $qualificationTypes = QualificationType::pluck('id','id')->all();

        return view('qualifications.edit', compact('qualification','qualificationTypes'));
    }

    /**
     * Update the specified qualification in the storage.
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
            
            $qualification = Qualification::findOrFail($id);
            $qualification->update($data);

            return redirect()->route('qualifications.qualification.index')
                ->with('success_message', 'Qualification was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified qualification from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $qualification = Qualification::findOrFail($id);
            $qualification->delete();

            return redirect()->route('qualifications.qualification.index')
                ->with('success_message', 'Qualification was successfully deleted.');
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
                'qualification_code' => 'string|min:1|nullable',
            'qualification_name' => 'string|min:1|nullable',
            'number_of_years' => 'numeric|nullable',
            'department_code' => 'string|min:1|nullable',
            'qualification_type_id' => 'nullable',
            'qualification_level' => 'string|min:1|nullable',
            'is_active' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
