@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить товар
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => 'products.store', 'files'=>'true']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем товар</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail" placeholder="" name="title"
                                   value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <span class="fw700">Дополнительные картинки</span>
                            <a href="javascript:changeProfile()" style="text-decoration: none;">
                                <i class="glyphicon glyphicon-edit"></i> Добавить
                            </a>&nbsp;&nbsp;

                            <input type="file" id="file" style="display: none"/>
                            <input type="hidden" id="file_name"/>

                            <div class="my-thumb-wrapper" id="image">
                                <div id="preview_image">

                                </div>
                                <i id="loading" class="my-loading fa fa-spinner fa-spin fa-3x fa-fw"></i>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Цена</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="price"
                                   value="{{old('price')}}">
                        </div>


                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2'])}}

                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail2">Описание</label>
                            <textarea name="description" id="exampleInputEmail2" cols="30" rows="10"
                                      class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('products.index')}}" class="btn btn-default">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
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