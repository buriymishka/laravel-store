@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Категории товаров

            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Категории товаров</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('product-categories.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}
                            </td>
                            <td>
                                <img src="{{$category->getImage()}}" alt="" width="100">
                            </td>
                            <td><a href="{{route('product-categories.edit', $category->id)}}" class="fa fa-pencil"></a>

                                {!! Form::open(['route' => ['product-categories.destroy', $category->id], 'method'=>'DELETE']) !!}

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