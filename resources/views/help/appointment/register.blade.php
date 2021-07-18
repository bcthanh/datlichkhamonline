@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="page-title">Tạo Lịch hẹn khám</div>
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/help/home/appointment">
                        {{ csrf_field() }}
                        <!--Nome-->
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 control-label">Tên bệnh nhân</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="sns" type="number" class="form-control" name="sns" value="{{ old('sns') }}" required>

                                @if ($errors->has('sns'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sns') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        
                        <!-- especialidade-->
                        <div class="form-group{{ $errors->has('especialidade') ? ' has-error' : '' }} row">
                            <label for="especialidade" class="col-md-4 control-label">Chuyên khoa</label>
                            <div class="col-md-8">
                                        <select class="form-control especialidade" id="especialidade" name="especialidade">
                                        @foreach ($proficiencies as $Proficiency)
                                            <option value="{{$Proficiency->id}}"> {{ $Proficiency->name }} </option>
                                        @endforeach
                                        </select>   
                                @if ($errors->has('especialidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('proficiency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Hora e data consulta-->
                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }} row">
                            <label for="data" class="col-md-4 control-label">Thời gian khám</label>

                            <div class="col-md-8">
                                <input id="data" type="datetime-local"  class="form-control data"  name="data" value="{{ old('data') }}" required>

                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- user_id-->
                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} row">
                            <label for="user_id" class="col-md-4 control-label">Bác sĩ</label>
                            <div class="col-md-8">             
                                    <select class="user_id form-control" id="user_id" name="user_id" place>
                                    <option value="0" disabled="true" selected="true">Chọn bác sĩ</option>
                                        </select>   
                                @if ($errors->has('Doctor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Doctor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Submit --}}
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Tạo lịch khám
                                </button>
                                </button>
                                <a href="/help/appointment/home">
                                <button type="button" class="btn btn-warning " >
                                    Trở lại
                                </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){ 
       
        $(document).on('change', '.data, .especialidade',   function(){
            
            let proficiencyInput = document.getElementById("especialidade");
            let date = document.getElementById("data").value
            
            let proficiency = proficiencyInput.options[proficiencyInput.selectedIndex].value;

            if(date){
                let div = $(this).parents();
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findUsersDate')!!}',
                    data:{'data': date, proficiency},
                    success: function(data){

                        let op ='<option value="0" selected disabled>Select a Doctor</option>';

                        for(var i=0; i<data.length; i++){
                            op+='<option value="'+data[i].id+'">'+data[i].
                            name+'</option>';
                        }

                        div.find('.user_id').html(" ");
                        div.find('.user_id').append(op);
                    },
                    error:function(){

                    }
                });
            }
            
    
        });
    
    });

</script>
