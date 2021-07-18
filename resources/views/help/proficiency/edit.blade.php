@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title">Chỉnh sửa Chuyên khoa</div>
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/help/home/proficiency/{{$proficiency->id}}">
                        {{ csrf_field() }}
                        <!--Nome-->
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Tên</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{$proficiency->name}}" required autofocus>
                                
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
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