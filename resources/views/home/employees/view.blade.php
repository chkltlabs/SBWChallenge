<h1>{{ $pageTitle }}</h1>

<h4><a href="{{ url("$employee->id/edit") }}">Edit This Employee</a> </h4>

<thead>
<tr>
    <td>Employee ID</td>
    <td>Employee Department</td>
    <td>Employee Name</td>
    <td>Employee Date Of Birth</td>
    <td>Edit</td>
    <td>Delete</td>
</tr>
</thead>
<tbody>
    <tr>
        <td>{{ $employee->id }}</td>
        <td>{{ $departments[$employee->departmentId]->departmentName }}</td>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->dob }}</td>
        <td><a href="{{ url("$employee->id/edit") }}">Edit</a></td>
        <td><a href="{{ url("$employee->id/delete") }}">Delete</a></td>

    </tr>
</tbody>