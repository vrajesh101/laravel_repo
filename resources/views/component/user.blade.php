@extends("layout.layout")

@section("title","User")
@push('styles')
    <link rel="stylesheet"  href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
@endpush
@section("content")
<table id="user" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>age</th>
            <th>Contact No</th>
            
        </tr>
    </thead>
    <tbody>
        <!-- @foreach ($user as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->age }}</td>
            <td>{{ $item->contactno }}</td>
            <td>
                <a href="" class="btn btn-primary btn-sm">Edit</a>
            
                <a href="" class="btn btn-danger btn-sm">Delete</a>
            </td>

        </tr>
        @endforeach -->
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("#user").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('/user') }}",
        "columns": [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'age', name: 'age' },
            { data: 'contactno', name: 'contactno' },
        ]
    });
});
</script>



@endsection