<h1>{{ $pageTitle }}</h1>

<h4><a href="{{ url('new') }}">Add New Dept</a> </h4>

<thead>
    <tr>
        <td>Department ID</td>
        <td>Department Name</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</thead>
<tbody>
    @foreach($depts as $dept)
        <tr>
            <td>{{ $dept->id }}</td>
            <td>{{ $dept->departmentName }}</td>
            <td><a href="{{ url("$dept->id") }}">View</a></td>
            <td><a href="{{ url("$dept->id/edit") }}">Edit</a></td>
            <td><a href="{{ url("$dept->id/delete") }}">Delete</a></td>
        </tr>
    @endforeach
</tbody>
