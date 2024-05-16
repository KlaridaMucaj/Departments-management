<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <form action="/employee" method="POST" enctype="multipart/form-data" id="myform" name="myform">
        @csrf
        <div class="container">
            <a href="/home" class="btn btn-dark float-center btn-dark">Home</a> &nbsp; &nbsp;
            <a href="/dep" class="btn btn-info float-center btn-info">Departaments</a>&nbsp; &nbsp;
            <a href="/create" class="btn btn-success float-center btn-success">Add Employee</a>

            <table class="table table-bordered data-table" id="mytable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Id</th>
                        <th>Departament Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </form>
</body>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').dataTable({
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
            }],
            "serverSide": true,
            ajax: {
                ajax: "{{ url('/employee/' . request()->route('departament')) }}",
                data: function(d) {
                    d.image = $('input[name=image]').val();
                    d.id = $('input[name=id]').val();
                    d.departament_id = $('input[name=departament_id]').val();
                    d.name = $('input[name=name]').val();
                    d.email = $('input[name=email]').val();
                    d.role = $('input[name=role]').val();
                    d.action = $('input[name=action]').val();
                }
            },
            columns: [
                {
    "name": "image",
    "data": "image",
    "render": function (data, type, full, meta) {
        return '<img src="' + data + '" alt="' + data + '"height="80" width="80"/>';
    },
    "title": "Profile picture",
    "orderable": true,
    "searchable": true
},
                {data: 'id', name: 'id'},
                {data: 'departament_id', name: 'departament_id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {data: 'action', name: 'action'},
            ]
        });
    });  
</script>
</html>