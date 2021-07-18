@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Helpdesk Dashboard 
                
                </div>
                <div class="panel-body">
                    <a href="{{ url('/help/register') }}" button type="button" class="btn btn-primary " >
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                    Đăng ký Bác sĩ
                    </button></a>
                        <hr>
                    <a href="{{ url('/help/proficiency/home') }}" button type="button" class="btn btn-primary " >
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    Quản lý Chuyên khoa
                   </button></a>
                        <hr>
                    <a href="{{ url('/help/appointment/home') }}" button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    Quản lý Lịch hẹn
                    </button></a>
{{--                         <hr>        
                    <a href="{{ url('/help/appointment/register') }}" button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                    Tạo Lịch hẹn
                    </button></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection