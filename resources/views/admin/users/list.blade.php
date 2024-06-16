<!DOCTYPE html>
<html>
<head>
    <title>users</title>
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
    <a href="/admin/users/insert" class="btn btn-success">add</a>
        <tr>
            <td>name</td>
            <td>lastname</td>
            <td>age</td>
            <td>phonenumber</td>
            <td>edit</td>
            <td>delete</td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->age}}</td>
            <td>{{$user->phonenumber}}</td>
            <td><a href="/admin/users/edit/{{$user->id}}" class="btn btn-warning">edit</a></td>
            <td><a href="/admin/users/delete/{{$user->id}}" class="btn btn-danger">delete</a></td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>