@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Сменить пароль

            </h1>
            @include('admin.errors')
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="form">
                <form class="form-horizontal" role="form" method="POST" action="/admin/password">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Новый Логин</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Логин" name="login" value="{{old('login')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Новый Пароль</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Пароль" name="password1">
                            </div>
                        </div>                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Новый Пароль ещё раз</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Пароль" name="password2">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default btn-sm">Изменить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- form  -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->

            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection