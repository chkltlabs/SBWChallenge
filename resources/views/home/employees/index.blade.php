<h1>{{ $pageTitle }}</h1>

<h4><a href="{{ url('new') }}">Add New Employee</a> </h4>

<thead>
    <tr>
        <td>Employee ID</td>
        <td>Employee Department</td>
        <td>Employee Name</td>
        <td>Employee Date Of Birth</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</thead>
<tbody>
    @foreach($employees as $emp)
        <tr>
            <td>{{ $emp->id }}</td>
            <td>{{ $departments[$emp->departmentId]->departmentName }}</td>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->dob }}</td>
            <td><a href="{{ url("$emp->id") }}">View</a></td>
            <td><a href="{{ url("$emp->id/edit") }}">Edit</a></td>
            <td><a href="{{ url("$emp->id/delete") }}">Delete</a></td>
        </tr>
    @endforeach
</tbody>
