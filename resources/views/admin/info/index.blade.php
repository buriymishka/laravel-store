@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Общая информация
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Информация</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">

                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Содержание</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($infos as $info)
                            <td>{{$info->id}}</td>
                            <td>Телефон</td>
                            <td>
                                {{$info->phone}}
                            </td>
                            <td><a href="{{route('info.edit', $info->id)}}" class="fa fa-pencil"></a></td>
                        </tr>
                        <tr>
                            <td>{{$info->id}}</td>
                            <td>Адрес
                            </td>
                            <td>
                                {{$info->address}}
                            </td>
                            <td><a href="{{route('info.edit', $info->id)}}" class="fa fa-pencil"></a></td>
                        </tr>
                        <tr>
                            <td>{{$info->id}}</td>
                            <td>Email
                            </td>
                            <td>
                                {{$info->email}}
                            </td>
                            <td><a href="{{route('info.edit', $info->id)}}" class="fa fa-pencil"></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection