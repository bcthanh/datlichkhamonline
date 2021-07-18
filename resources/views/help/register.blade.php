{{-- @if (Auth::check())
                        @foreach (Auth::user()->role as $role )
                            @if ($role->name == 'Helpdesk')                           
                                <a href="{{ url('/help/home') }}" button type="button" class="btn btn-primary btn-sm" >
                                Home Helpdesk</button></a>
                            @else                       
                                <a href="{{ url('/medic/home') }}">Home Doctor</a>
                            @endif
                        @endforeach
                        @endif --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title"><h3>Đăng ký Bác sĩ</h3></div>
            <div class="panel panel-default">               
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/help/home/register">
                        {{ csrf_field() }}
                        <!--Nome-->
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Họ tên</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Numero seg_social-->
                        <div class="form-group{{ $errors->has('seg_social') ? ' has-error' : '' }} row">
                            <label for="seg_social" class="col-md-4 control-label">Số điện thoại</label>

                            <div class="col-md-8">
                                <input id="seg_social" type="number" class="form-control" name="seg_social" value="{{ old('seg_social') }}" required>

                                @if ($errors->has('seg_social'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seg_social') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Email -->
                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 control-label">Địa chỉ Email</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- proficiency-->
                        <div class="form-group{{ $errors->has('proficiency') ? ' has-error' : '' }} row">
                            <label for="proficiency" class="col-md-4 control-label">Chuyên khoa</label>


                            <div class="col-md-8">
                                        <select multiple class="form-control" id="proficiency" name="proficiency[]">
                                           @foreach ($proficiencies as $Proficiency)
                                            <option value="{{$Proficiency->id}}"> {{ $Proficiency->name }} </option>
                                        @endforeach
                                        </select>   
                                @if ($errors->has('proficiency'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Proficiency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Hora entrada-->
                        <div class="form-group{{ $errors->has('hora_in') ? ' has-error' : '' }} row">
                            <label for="hora_in" class="col-md-4 control-label">Giờ khám Bắt đầu</label>

                            <div class="col-md-8">
                                <input id="hora_in" type="time" class="form-control" name="hora_in" value="{{ old('hora_in') }}" required>

                                @if ($errors->has('hora_in'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hora_in') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- Hora saída-->

                          <div class="form-group{{ $errors->has('hora_out') ? ' has-error' : '' }} row">
                            <label for="hora_out" class="col-md-4 control-label">Giờ khám Kết thúc</label>

                            <div class="col-md-8">
                                <input id="hora_out" type="time" class="form-control" name="hora_out" value="{{ old('hora_out') }}" required>

                                @if ($errors->has('hora_out'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hora_out') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        

                        <!--Password-->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Confirmação de password-->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 control-label">Xác nhận Mật khẩu</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng ký Bác sĩ
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection