@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Информация о заказе
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Информация о заказе</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <span class="fw400">Имя: <span class="fw700">{{$order->name}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Почтовый индекс: <span class="fw700">{{$order->postcode}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Фирма: <span class="fw700">{{$order->firm}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Город: <span class="fw700">{{$order->city}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">E-mail: <span class="fw700">{{$order->email}}</span></span>


                        </div>
                        <div class="form-group">
                            <span class="fw400">Страна: <span class="fw700">{{$order->country}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Улица/Номер дома: <span class="fw700">{{$order->street}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Телефон: <span class="fw700">{{$order->phone}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Дата: <span class="fw700">{{$order->created_at}}</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Сумма: <span class="fw700">{{$order->price}} €</span></span>

                        </div>
                        <div class="form-group">
                            <span class="fw400">Заказ: <span class="fw700">{!!$order->cart!!}</span></span>

                        </div>
                        @if($order->status)
                            <a href="{{route('orders.show', $order->id)}}" class="fz28 fa fa-check-square-o"></a>
                        @else
                            <a href="{{route('orders.show', $order->id)}}" class="fz28 fa fa-square-o"></a>
                        @endif

                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('orders.index')}}" class="btn btn-default">Назад</a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection