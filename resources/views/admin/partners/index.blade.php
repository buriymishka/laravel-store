@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Партнёры
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Партнёры</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('partners.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ССылка</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($partners as $partner)
                        <tr>
                            <td>{{$partner->id}}</td>
                            <td>{{$partner->link}}</td>
                            <td>
                                <img src="{{$partner->getImage()}}" alt="" width="100">
                            </td>
                            <td><a href="{{route('partners.edit', $partner->id)}}" class="fa fa-pencil"></a>

                                {!! Form::open(['route' => ['partners.destroy', $partner->id], 'method'=>'DELETE']) !!}

                                <button class="delete" type="submit" onclick="return confirm('Удалить?')">
                                    <i href="#" class="fa fa-remove"></i>
                                </button>
                                {!! Form::close() !!}


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