
<div>
    {{ Form::label('departmentName', "Department Name *") }}
    {{ Form::text('departmentName', $dept->departmentName, ['required']) }}
</div>

<button name="btnSubmit">Submit</button>

{{ Form::close() }}