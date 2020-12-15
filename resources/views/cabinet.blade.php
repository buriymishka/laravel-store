<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin.css">
    <title>Document</title>
</head>
<body>
@include('admin.errors')

@if(session('status'))
    <div class="alert alert-danger">
        {{session('status')}}
    </div>
@endif

<div class="form">
    <form class="form-horizontal" role="form" method="POST" action="/cabinet">
        {{csrf_field()}}
        <div class="form-group">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Логин" name="login" value="{{old('login')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default btn-sm">Войти</button>
                </div>
            </div>
        </div>
    </form>
</div><!-- form  -->
</body>
</html>