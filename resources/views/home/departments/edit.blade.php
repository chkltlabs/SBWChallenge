<h1>{{ $pageTitle }}</h1>

{!! Form::model($dept, ['action' => ['DepartmentController@update', $dept->id]]) !!}
@include('home.departments.form')