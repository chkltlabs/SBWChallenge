<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EmployeeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $viewData = [
        'pageTitle' => 'Default',
        'pageId' => '',
    ];

    function index()
    {
        $this->viewData['pageTitle'] = "All Employees";
        $this->viewData['departments'] = Department::all();
        $this->viewData['employees'] = Employee::all();
        return view('home.employees.index', $this->viewData);
    }

    function view(Request $request, $id)
    {
        $this->viewData['employee'] = Employee::find($id);
        $name = $this->viewData['employee']->name;
        $this->viewData['pageTitle'] = "Details of Employee: $name";
        return view('home.employees.view', $this->viewData);
    }

    function create()
    {
        $this->viewData['pageTitle'] = "Create New Employee Record";
        $this->viewData['departments'] = Department::all();
        return view('home.employees.create', $this->viewData);
    }

    function store(Request $request)
    {
        //get data submitted in create() form
        $attrs['departmentId'] = $request['departmentId'];
        $attrs['name'] = $request['name'];
        $attrs['dob'] = $request['dob'];
        //create a new record in the database
        $newId = Employee::create($attrs);

        if($newId){
            //redirect to view for newly created employee record
            return redirect()->action('EmployeeController@view', $newId);
        }else{
            //if Employee::create() fails, $newId will be set to null
            return redirect()->back()->withErrors('Employee record could not be created, please check your submission and try again');
        }


    }

    function edit(Request $request, $id)
    {
        $this->viewData['employee'] = Employee::find($id);

        if($this->viewData['employee']){
            $name = $this->viewData['employee']->name;
            $this->viewData['pageTitle'] = "Edit Details for Employee: $name";
            //redirect to view for newly created employee record
            return view('home.employees.edit', $this->viewData);
        }else{
            //if Employee::create() fails, $this->viewData['employee'] will be set to null
            return redirect()->back()->withErrors('Employee record could not be found, please contact your admin');
        }
    }

    function update(Request $request, $id)
    {
        $existingRecord = Employee::find($id);
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
        Employee::find($id)->delete();
        return $this->index();
    }
}
