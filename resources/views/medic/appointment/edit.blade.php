@extends('layouts.appdoctor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title"><h3>Thực hiện việc khám bệnh</h3></div>
            <div class="panel panel-default">
                
                <div class="panel-body">

                  <!--Nome-->
                       <form class="form-horizontal">  
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Tên bệnh nhân</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control"value="{{$appointment->name}}" disabled >
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
                        
                        <!-- Hora e data consulta-->
                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }} row">
                            <label for="data" class="col-md-4 control-label">Ngày hẹn khám</label>

                            <div class="col-md-8">
                                
                                

                                <input id="data" type="datetime-local" class="form-control" name="data" value="<?= str_replace(' ', 'T', $appointment->data)?>" disabled>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('especialidade') ? ' has-error' : '' }} row">
                            <label for="especialidade" class="col-md-4 control-label">Ghi chú</label>

                            <div class="col-md-8">
                                <textarea id="especialidade" class="form-control" name="especialidade" disabled>
                                    {{ $appointment->especialidade }}
                                </textarea> 
                            </div>
                        </div>

                         </form>
                    <form class="form-horizontal" role="form" method="POST" action="/medic/home/appointment/{{$appointment->id}}">
                        {{ csrf_field() }}
                        

                        <!--Sintomas-->
                
                       
                        <div class="form-group{{ $errors->has('sintomas') ? ' has-error' : '' }} row">
                            <label for="sintomas" class="col-md-4 control-label">Triệu chứng</label>

                            <div class="col-md-8">
                                <textarea name="sintomas" cols="40" rows="5" id="sintomas" type="text" class="form-control"  required autofocus></textarea>
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
                                <textarea name="diagnostico" cols="40" rows="5" id="diagnostico" type="text" class="form-control"  required autofocus></textarea>
                                
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
                                <button type="submit" class="btn btn-primary">
                                    Lưu
                                </button>
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