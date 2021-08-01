@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title">Chỉnh sửa Chuyên khoa</div>
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/help/home/proficiency/{{$proficiency->id}}"   enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!--Nome-->
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
                            <label for="name" class="col-md-4 control-label">Chuyên khoa</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{$proficiency->name}}" required autofocus>
                                
                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            Ảnh đại diện hiện tại
                            <img src="{{asset('uploads/chuyenkhoa/') . '/'.$proficiency->pro_avatar }}" width="100px" alt="">
                            <br>
                            <label for="name" class="col-md-4 control-label">Thay ảnh đại diện</label>
                           <input type="file" name="file">    
                           @if ($errors->has('file'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif               
                        </div>
                        {{-- Submit --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật Chuyên khoa
                                </button>
                                <a href="/help/proficiency/home">
                                <button type="button" class="btn btn-warning " >
                                Trở lại
                                    </button>
                                    <a/>
                                     </form>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection