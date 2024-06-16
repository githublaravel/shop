<!DOCTYPE html>
<html>
<head>
    <title>categories</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body>

    <table class="table table-bordered">
        <a href="/admin/categories/insert" class="btn btn-success">add</a>
        <tr>
            <td>name</td>
            <td>edit</td>
            <td>delete</td>
        </tr>
        @foreach($cats as $cat)
        <tr>
            <td>{{$cat->name}}</td>
            <td><a href="/admin/categories/edit/{{$cat->id}}" class="btn btn-warning">edit</a></td>
            <td><a href="/admin/categories/delete/{{$cat->id}}" class="btn btn-danger">delete</a></td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>