<div>
    {{ Form::label('department', "Employee Department *") }}
    {{ Form::select('departmentId', $departments, $employee->departmentId, ['required', 'placeholder' => "Select A Department"]) }}
</div>

<div>
    {{ Form::label('name', "Employee Name *") }}
    {{ Form::text('name', $employee->name, ['required']) }}
</div>

<div>
    {{ Form::label('dob', "Employee Date Of Birth") }}
    {{ Form::date('dob', date('Y-m-d', strtotime($employee->dob))) }}
</div>

<button name="btnSubmit">Submit</button>

{{ Form::close() }}