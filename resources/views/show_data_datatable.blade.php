<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- This link is for toastr style  -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <title>Show data</title>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text text-success" style="text-align: center;">SHOW DATA IN A TABLE</h1>
        <hr class="text text-danger">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{url('add-data')}}" class="btn btn-success my-3">ADD DATA</a>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postdata as $key=>$post)
                        <tr>
                            <td class="table-primary">{{$key+1}}</td>
                            <td class="table-success">{{$post->title}}</td>

                            <td>{{ Str::limit($post->description,30) }}</td>
                            <!-- <td>{{$post->description}}</td> -->

                            <!-- different date format. following formats are date format that can be use in laravel -->

                            <!-- <td>{{$post->created_at}}</td> -->
                            <!-- <td>{{$post->created_at->toDateString()}}</td> -->
                            <!-- <td>{{$post->created_at->toformattedDateString()}}</td> -->
                            <!-- <td>{{$post->created_at->toDayDateTimeString()}}</td> -->
                            <!-- <td>{{ \Carbon\Carbon::parse($post->created_at)->format('y/m/d') }}</td> -->
                            <!-- <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/y') }}</td> -->
                            <td>
                                {{ date('d-m-Y', strtotime($post->created_at))}}
                            </td>
                            <td class="table-info">
                                @if($post->status == 1)
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td>
                                <a href="{{url('edit-data/'.$post->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{url('delete-data/'.$post->id)}}" onclick="return confirm('Are you sure!')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- $postdata->links() --}} <!-- for pagination -->
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {!! Toastr::message() !!}.


</body>

</html>