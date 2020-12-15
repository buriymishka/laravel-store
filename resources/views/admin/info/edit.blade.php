@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить информация
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => ['info.update', $info->id], 'method'=>'PUT']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем информация</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Телефон</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="phone"
                                   value="{{$info->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Адрес</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="address"
                                   value="{{$info->address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email"
                                   value="{{$info->email}}">
                        </div>

                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('posts.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection