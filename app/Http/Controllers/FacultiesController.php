<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Exception;

class FacultiesController extends Controller
{

    /**
     * Display a listing of the faculties.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $faculties = Faculty::paginate(25);

        return view('faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new faculty.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('faculties.create');
    }

    /**
     * Store a new faculty in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Faculty::create($data);

            return redirect()->route('faculties.faculty.index')
                ->with('success_message', 'Faculty was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified faculty.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $faculty = Faculty::findOrFail($id);

        return view('faculties.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified faculty.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
        

        return view('faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified faculty in the storage.
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
            
            $faculty = Faculty::findOrFail($id);
            $faculty->update($data);

            return redirect()->route('faculties.faculty.index')
                ->with('success_message', 'Faculty was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified faculty from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $faculty = Faculty::findOrFail($id);
            $faculty->delete();

            return redirect()->route('faculties.faculty.index')
                ->with('success_message', 'Faculty was successfully deleted.');
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
                'faculty_code' => 'string|min:1|nullable',
            'faculty_name' => 'string|min:1|nullable',
            'is_active' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
