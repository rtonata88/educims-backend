<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Module;
use Illuminate\Http\Request;
use Exception;

class ModulesController extends Controller
{

    /**
     * Display a listing of the modules.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $modules = Module::with('department')->paginate(25);

        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new module.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $departments = Department::pluck('department_code','id')->all();
        
        return view('modules.create', compact('departments'));
    }

    /**
     * Store a new module in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Module::create($data);

            return redirect()->route('modules.module.index')
                ->with('success_message', 'Module was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified module.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $module = Module::with('department')->findOrFail($id);

        return view('modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified module.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $departments = Department::pluck('department_code','id')->all();

        return view('modules.edit', compact('module','departments'));
    }

    /**
     * Update the specified module in the storage.
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
            
            $module = Module::findOrFail($id);
            $module->update($data);

            return redirect()->route('modules.module.index')
                ->with('success_message', 'Module was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified module from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $module = Module::findOrFail($id);
            $module->delete();

            return redirect()->route('modules.module.index')
                ->with('success_message', 'Module was successfully deleted.');
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
                'module_code' => 'string|min:1|nullable',
            'module_name' => 'string|min:1|nullable',
            'module_year_level' => 'string|min:1|nullable',
            'department_id' => 'nullable',
            'credits' => 'string|min:1|nullable',
            'has_practical' => 'boolean|nullable',
            'nqflevel' => 'string|min:1|nullable',
            'qualification_level' => 'string|min:1|nullable',
            'is_active' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['has_practical'] = $request->has('has_practical');
        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
