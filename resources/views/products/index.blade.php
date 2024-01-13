@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить Продукт</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Контент</th>
                                        <th>Картинка</th>
                                        <th>Цена</th>
                                        <th>Кол-во</th>
                                        <th>Категория</th>
                                        <th>Группа</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->content }}</td>
                                            <td>{{ $product->preview_image }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->count }}</td>

                                            @if(!empty($product->category->title))
                                                <td>{{ $product->category->title }}</td>
                                            @else
                                                <td>No category</td>
                                            @endif

                                            <td>{{ $product->group_id }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
