<h1>{{ $pageTitle }}</h1>

{!! Form::model($employee, ['action' => ['EmployeeController@store', $employee->id]]) !!}
@include('home.employees.form')

