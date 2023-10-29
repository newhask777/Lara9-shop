@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать Продукт</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" value="{{ $product->name ?? old('name') }}" name="name" class="form-control" placeholder="Название">
                      </div>
        
                      <div class="form-group">
                        <input type="text" value="{{ $product->description ?? old('description') }}" name="description" class="form-control" placeholder="Описание">
                      </div>
        
                      <div class="form-group">
                        <input type="text" value="{{ $product->content ?? old('content') }}" name="content" class="form-control" placeholder="Контент">
                      </div>
        
                      <div class="form-group">
                        <input type="text" value="{{ $product->preview_image ?? old('preview_image') }}" name="preview_image" class="form-control" placeholder="Картинка">
                      </div>
        
                      <div class="form-group">
                        <input type="text" value="{{ $product->price ?? old('price') }}" name="price" class="form-control" placeholder="Цена">
                      </div>

                      <div class="form-group">
                        <input type="text" value="{{ $product->count ?? old('count') }}" name="count" class="form-control" placeholder="Кол-во">
                      </div>

                      <div class="form-group">
                        <label>Multiple</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
        
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
