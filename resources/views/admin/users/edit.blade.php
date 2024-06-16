<!DOCTYPE html>
<html lang="en">
<head>
    <title>edit categories</title>
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
<div style="text-align:center;margin-top:250px;">
    <form action="/admin/users/edit/{{$user->id}}" method="post">
        @CSRF
        <input class="input" type="text" value="{{$user->name}}" name="name">
        <br><br>
        <input class="input" type="text" value="{{$user->lastname}}" name="lastname">
        <br><br>
        <input class="input" type="text" value="{{$user->age}}" name="age">
        <br><br>
        <input class="input" type="text" value="{{$user->phonenumber}}" name="phonenumber">
        <br><br>
        <button type="submit" class="btn btn-success">save</button>
    </form>
    </div>
    
</body>
</html>