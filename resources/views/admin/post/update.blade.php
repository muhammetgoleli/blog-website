
@extends('layout')
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Post Güncelle
      <a href="{{url('admin/post')}}" class="float-right btn btn-sm btn-dark">Tüm Yazılar</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        @if($errors)
          @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
          @endforeach
        @endif

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif

        <form method="post" action="{{url('admin/post/'.$data->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
              <tr>
                    <th>Kategori<span class="text-danger">*</span></th>
                    <td>
                      <select class="form-control" name="category">
                        @foreach($cats as $cat)
                          @if($cat->id==$data->cat_id)
                          <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                          @else
                          <option value="{{$cat->id}}">{{$cat->title}}</option>
                          @endif
                        @endforeach
                      </select>
                    </td>
              </tr>
              <tr>
                  <th>Başlık</th>
                  <td><input type="text" value="{{$data->title}}" name="title" class="form-control" /></td>
              </tr>
              <tr>
                  <th>Görsel</th>
                  <td>
                    <p class="my-2"><img width="80" src="{{asset('imgs/full')}}/{{$data->full_img}}" /></p>
                    <input type="hidden" value="{{$data->full_img}}" name="post_image" />
                    <input type="file" name="post_image" />
                  </td>
              </tr>
              <tr>
                  <th>Açıklama<span class="text-danger">*</span></th>
                  <td>
                    <textarea class="form-control" name="detail">{{$data->detail}}</textarea>
                  </td>
              </tr>
              <tr>
                  <td colspan="2">
                      <input type="submit" class="btn btn-primary" />
                  </td>
              </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
