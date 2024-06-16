<!DOCTYPE html>
<html>
<head>
    <title>insert category</title>
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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
            <br>
        @endforeach       
    @endif
    <form action="/admin/products/insert" method="post">
        @CSRF
        <input class="input" type="text" placeholder="name" name="name">
        <br><br>
        <input class="input" type="text" placeholder="price" name="price">
        <br><br>
        <input class="input" type="text" placeholder="offer" name="offer">
        <br><br>
        <select name="category_id" id="">
            <option value="">---</option>
            @foreach ($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            
        </select>
        <br><br>
        <button type="submit" class="btn btn-success">save</button>
    </form>
    </div>
</body>
</html>