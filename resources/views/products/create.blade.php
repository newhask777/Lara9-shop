@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить Продукт</h1>
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
        
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Название">
              </div>

              <div class="form-group">
                <input type="text" name="description" class="form-control" placeholder="Описание">
              </div>

              <div class="form-group">
                <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент">{{ old('content') }}</textarea>
              </div>

              <div class="form-group">
                <input type="text" name="price" class="form-control" placeholder="Цена">
              </div>

              <div class="form-group">
                <input type="text" value="{{ old('count') }}" name="count" class="form-control" placeholder="Кол-во">
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Картинка</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                  </div>
                </div>
              </div>
              {{-- Categories --}}
              <div class="form-group">
                <label>Категория</label>
                <select name="category_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>Выберите категорию</option>

                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                  
                </select>
              </div>
              {{-- Groups --}}
              <div class="form-group">
                <label>Группа</label>
                <select name="group_id" class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>Выберите группу</option>

                  @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                  @endforeach
                  
                </select>
              </div>
              {{-- Tags --}}
              <div class="form-group">
                <label>Тэги</label>
                <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">

                  @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                  @endforeach
                 
                </select>
              </div>

              <div class="form-group">
                <label>Цвет</label>
                <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">

                  @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Добавить">
              </div>

            </form>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection