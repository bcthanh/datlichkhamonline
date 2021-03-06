@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title">Thêm chuyên khoa</div>
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/help/home/proficiency" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!--Nome-->
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tên chuyên khoa</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Ảnh đại diện</label>
                           <input type="file" name="file" required>    
                           @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif               
                        </div>

                        {{-- Submit --}}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Lưu
                                </button>
                                </button>
                                <a href="/help/proficiency/home">
                                <button type="button" class="btn btn-warning " >
                                Trở lại
                                    </button>
                                    <a/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection