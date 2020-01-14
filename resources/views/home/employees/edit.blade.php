<h1>{{ $pageTitle }}</h1>

{!! Form::model($employee, ['action' => ['EmployeeController@update', $employee->id]]) !!}
@include('home.employees.form')