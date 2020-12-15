@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить товар
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => ['products.update', $product->id], 'method'=>'PUT', 'files'=>true]) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем товар</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName">Название</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="" name="title"
                                   value="{{$product->title}}">
                        </div>
                        <div class="form-group">
                            <img src="{{$product->getImage()}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" name="image" id="exampleInputFile">

                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Цена</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                   name="price"
                                   value="{{number_format($product->price, 2, '.', '')}}">
                        </div>


                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control select2'])}}

                        </div>

                        <div class="form-group edit-page">
                            <span class="fw700">Дополнительные картинки</span>
                            <a href="javascript:changeProfile()" style="text-decoration: none;">
                                <i class="glyphicon glyphicon-edit"></i> Добавить
                            </a>&nbsp;&nbsp;

                            <input type="file" id="file" style="display: none"/>
                            <input type="hidden" id="file_name"/>

                            <div class="my-thumb-wrapper" id="image">
                                <div id="preview_image">
                                    @foreach($product_images as $product_image)
                                        <div class="pr"><img class="my-thumb" alt=""
                                                             src="/uploads/products/{{$product_image->image}}"><span
                                                    class="my-cross">×</span></div>
                                    @endforeach
                                </div>
                                <i id="loading" class="my-loading fa fa-spinner fa-spin fa-3x fa-fw"></i>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" cols="30" rows="10" class="form-control">{{$product->description}}
              </textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('products.index')}}" class="btn btn-default">Назад</a>
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