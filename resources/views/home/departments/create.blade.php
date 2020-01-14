<h1>{{ $pageTitle }}</h1>

{!! Form::model($dept, ['action' => ['DepartmentController@store', $dept->id]]) !!}
@include('home.departments.form')

