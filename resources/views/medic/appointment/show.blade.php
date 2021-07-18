@extends('layouts.appdoctor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title">Thông tin Lịch khám</div>
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Thông tin Lịch khám</div> -->
                <div class="panel-body">

                  <!--Nome-->
                       <form class="form-horizontal">  
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Tên bệnh nhân</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control"value="{{$appointment->name}}" disabled >
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Pacient Name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                
                       
                         <!-- Numero sns-->
                        <div class="form-group{{ $errors->has('sns') ? ' has-error' : '' }} row">
                            <label for="sns" class="col-md-4 control-label">Số điện thoại</label>

                            <div class="col-md-8">
                                <input id="sns" type="number" class="form-control" name="sns" value="{{$appointment->sns}}" disabled>

                                @if ($errors->has('sns'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Social Security Number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                    
                        <!-- especialidade-->
                        <div class="form-group{{ $errors->has('especialidade') ? ' has-error' : '' }} row">
                            <label for="especialidade" class="col-md-4 control-label">Chuyên khoa</label>
                            <div class="col-md-8">
                                        <select class="form-control" id="especialidade" name="especialidade" 
                                        placeholder="{{$appointment->especialidade}}" value="" disabled>
                                            @foreach ($proficiencies as $Proficiency)
                                            <option value="{{$Proficiency->id}}" {{ $appointment->especialidade == $Proficiency->name ? "selected" : 0 }}
                                                > {{ $Proficiency->name }} </option>
                                            }
                                            }
                                            @endforeach
                                        </select>   
                                @if ($errors->has('especialidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Proficiency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Hora e data consulta-->
                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }} row">
                            <label for="data" class="col-md-4 control-label">Thời gian đăng ký khám</label>

                            <div class="col-md-8">
                                
                                

                                <input id="data" type="datetime-local" class="form-control" name="data" value="<?= str_replace(' ', 'T', $appointment->data)?>" disabled>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                   

                         </form>
                    <form class="form-horizontal" role="form" method="POST" action="/medic/home/appointment/{{$appointment->id}}">
                        {{ csrf_field() }}
                        

                        <!--Sintomas-->
                
                       
                        <div class="form-group{{ $errors->has('sintomas') ? ' has-error' : '' }} row">
                            <label for="sintomas" class="col-md-4 control-label">Triệu chứng</label>

                            <div class="col-md-8">
                                <textarea name="sintomas" cols="40" rows="5" id="sintomas" type="text" class="form-control"  disabled autofocus>{{$appointment->sintomas}}</textarea>
                                @if ($errors->has('sintomas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sintomas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <!--Diagnostico-->
                           <div class="form-group{{ $errors->has('diagnostico') ? ' has-error' : '' }} row">
                            <label for="diagnostico" class="col-md-4 control-label">Chẩn đoán</label>

                            <div class="col-md-8">
                                <textarea name="diagnostico" cols="40" rows="5" id="diagnostico" type="text" class="form-control"  disabled autofocus>{{$appointment->diagnostico}}</textarea>
                                
                                @if ($errors->has('diagnostico'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('diagnostico') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>       
                       
                      
                        {{-- Submit --}}
                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-4">
                                <a href="/medic/appointment/home">
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