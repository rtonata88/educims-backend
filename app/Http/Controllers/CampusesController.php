<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Http\Request;
use Exception;

class CampusesController extends Controller
{

    /**
     * Display a listing of the campuses.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $campuses = Campus::paginate(25);

        return view('campuses.index', compact('campuses'));
    }

    /**
     * Show the form for creating a new campus.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('campuses.create');
    }

    /**
     * Store a new campus in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Campus::create($data);

            return redirect()->route('campuses.campus.index')
                ->with('success_message', 'Campus was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified campus.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $campus = Campus::findOrFail($id);

        return view('campuses.show', compact('campus'));
    }

    /**
     * Show the form for editing the specified campus.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $campus = Campus::findOrFail($id);
        

        return view('campuses.edit', compact('campus'));
    }

    /**
     * Update the specified campus in the storage.
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
            
            $campus = Campus::findOrFail($id);
            $campus->update($data);

            return redirect()->route('campuses.campus.index')
                ->with('success_message', 'Campus was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified campus from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $campus = Campus::findOrFail($id);
            $campus->delete();

            return redirect()->route('campuses.campus.index')
                ->with('success_message', 'Campus was successfully deleted.');
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
                'campus_name' => 'string|min:1|nullable',
            'postal_address' => 'string|min:1|nullable',
            'physical_address' => 'string|min:1|nullable',
            'contact_number' => 'numeric|nullable',
            'contact_person' => 'string|min:1|nullable',
            'is_active' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
