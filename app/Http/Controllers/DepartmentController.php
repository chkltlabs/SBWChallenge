<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DepartmentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $viewData = [
        'pageTitle' => 'Default',
        'pageId' => '',
    ];

    function index()
    {
        $this->viewData['pageTitle'] = "All Departments";
        $this->viewData['depts'] = Department::all();
        return view('home.departments.index', $this->viewData);
    }

    function view(Request $request, $id)
    {
        $this->viewData['dept'] = Department::find($id);
        $name = $this->viewData['dept']->departmentName;
        $this->viewData['pageTitle'] = "Details of Department: $name";
        return view('home.departments.view', $this->viewData);
    }

    function create()
    {
        $this->viewData['pageTitle'] = "Create New Department";
        return view('home.departments.create', $this->viewData);
    }

    function store(Request $request)
    {
        //get data submitted in create() form
        $attrs['departmentName'] = $request['name'];
        //create a new record in the database, or find an existing record that matches the criteria
        $newId = Department::firstOrCreate($attrs);

        if($newId){
            //redirect to view for newly created department record
            return redirect()->action('DepartmentController@view', $newId);
        }else{
            //if Department::create() fails, $newId will be set to null
            return redirect()->back()->withErrors('Department record could not be created, please check your submission and try again');
        }


    }

    function edit(Request $request, $id)
    {
        $this->viewData['dept'] = Department::find($id);

        if($this->viewData['dept']){
            $name = $this->viewData['dept']->departmentName;
            $this->viewData['pageTitle'] = "Edit Department: $name";
            return view('home.departments.edit', $this->viewData);
        }else{
            return redirect()->back()->withErrors('Department record could not be found, please contact your admin');
        }
    }

    function update(Request $request, $id)
    {
        $existingRecord = Department::find($id);
        if(!$existingRecord){
            //if no existing record could be found, create from scratch
            return $this->store($request);
        }
        //get data submitted in edit() form
        $attrs['departmentId'] = $request['departmentId'];
        $attrs['name'] = $request['name'];
        $attrs['dob'] = $request['dob'];
        //create a new record in the database
        $existingRecord->update($attrs);
        return $this->view($request, $id);
    }

    function delete(Request $request, $id)
    {
        foreach(Employee::where('departmentId', $id)->get() as $employee){
            $employee->departmentId = null;
            $employee->save();
        }
        Department::find($id)->delete();
        return $this->index();
    }

}
