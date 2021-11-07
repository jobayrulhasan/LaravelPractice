<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Show data</title>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text text-success" style="text-align: center;">EDIT YOUR DATA HERE</h1>
        <hr class="text text-danger">
        <div class="row">
            <div class="alert alert-danger">
                <div class="col-sm-12">
                    <a href="{{url('show-data')}}" class="btn btn-warning my-3">show Data</a>
                    <form action="{{url('/store-edit-data/'.$post->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title"><strong>Title</strong></label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description"><strong>Description</strong></label>
                            <textarea name="description" class="form-control my-1" cols="30" rows="6">{{$post->description}}</textarea>
                        </div>
                        <input type="submit" value="Save data" class="btn btn-info my-3">
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>