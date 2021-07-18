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

@extends('layouts.appdoctor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title"><h3>Chỉnh sửa Hồ sơ</h3></div>
            <div class="panel panel-default">               
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/medic/profile/update">
                        {{ csrf_field() }}
                        <!--Nome-->
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Họ tên</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

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
                                <input id="seg_social" type="number" class="form-control" name="seg_social" value="{{ $user->seg_social }}" required>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

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

                        <!-- About me - Bio -->
                        <div class="card">
							<div class="card-body">
								<h4 class="card-title">About Me</h4>
								<div class="form-group mb-0">
									<label>Biography</label>
									<textarea class="form-control" name="bio"  rows="5">{{ $profile->bio }}</textarea>
								</div>
							</div>
						</div>
                        
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Thông tin phòng khám</h4>
								<div class="row form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Tên phòng khám</label>
											<input type="text" name="clinic_name"  value="{{ $profile->clinic_name }}" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Địa chỉ phòng khám</label>
											<input type="text" name="clinic_address"  value="{{ $profile->clinic_address }}" class="form-control">
										</div>
									</div>
									
								</div>
							</div>
						</div>
						

						<!-- About me - Experience -->
                        <div class="card">
							<div class="card-body">
								<h4 class="card-title">Thông tin khác</h4>

								<div class="form-group mb-0">
									<label>Giáo dục</label>
									<textarea class="form-control" name="education"  rows="5">{{ $profile->education }}</textarea>
								</div>

								<div class="form-group mb-0">
									<label>Kinh nghiệm</label>
									<textarea class="form-control" name="experience" name="bio" rows="5">{{ $profile->experience }}</textarea>
								</div>								

								<div class="form-group mb-0">
									<label>Giải thưởng</label>
									<textarea class="form-control" name="awards" rows="5">{{ $profile->awards }}</textarea>
								</div>

							</div>
						</div>

						
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật Hồ sơ
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