<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Exception;

class DepartmentsController extends Controller
{

    /**
     * Display a listing of the departments.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::with('faculty')->paginate(25);

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new department.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $faculties = Faculty::pluck('faculty_code','id')->all();
        
        return view('departments.create', compact('faculties'));
    }

    /**
     * Store a new department in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Department::create($data);

            return redirect()->route('departments.department.index')
                ->with('success_message', 'Department was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified department.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $department = Department::with('faculty')->findOrFail($id);

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $faculties = Faculty::pluck('faculty_code','id')->all();

        return view('departments.edit', compact('department','faculties'));
    }

    /**
     * Update the specified department in the storage.
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
            
            $department = Department::findOrFail($id);
            $department->update($data);

            return redirect()->route('departments.department.index')
                ->with('success_message', 'Department was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified department from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();

            return redirect()->route('departments.department.index')
                ->with('success_message', 'Department was successfully deleted.');
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
                'department_code' => 'string|min:1|nullable',
            'department_name' => 'string|min:1|nullable',
            'faculty_id' => 'nullable',
            'is_active' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
