<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Web đặt lịch khám Quảng Ngãi</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /*color: #636b6f;*/
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                /*color: #636b6f;*/
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


        </style>
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="css/welcome.css" rel="stylesheet" type="text/css"/>

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>
        <div class="flex-center">
            <!-- START doan nay show ra khi login -->
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        @foreach (Auth::user()->role as $role )
                            @if ($role->name == 'Helpdesk')                           
                                <a href="{{ url('/help/home') }}">Home Helpdesk</a>
                            @else                       
                                <a href="{{ url('/medic/home') }}">Home Doctor</a>
                            @endif
                        @endforeach
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        {{-- <a href="{{ url('/register') }}">Register</a> --}}
                    @endif
                </div>
            @endif
            <!-- END doan nay show ra khi login -->

            <div class="content">
                @if (Auth::check())
                <div class="title m-b-md">
                    HealthIT
                </div>
                @else 
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 "><img style="padding-top: 18px;" src="{{asset('img/logo.png') }}" alt="" ></div>
                        <div class="col-sm-9"><h1>Web đặt lịch khám Quảng Ngãi</h1></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <!-- <div class="title m-b-md"> -->
                                        Đặt lịch khám Online
                                    <!-- </div> -->
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="/appointmentstore">
                                        {{ csrf_field() }}
                                        <!--Nome-->
                                       
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Tên bệnh nhân</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Numero sns-->
                                        <div class="form-group{{ $errors->has('sns') ? ' has-error' : '' }}">
                                            <label for="sns" class="col-md-4 control-label">Số điện thoại</label>

                                            <div class="col-md-6">
                                                <input id="sns" type="number" class="form-control" name="sns" value="{{ old('sns') }}" required>

                                                @if ($errors->has('sns'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('sns') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>                        
                                        <!-- especialidade-->
                                        <div class="form-group{{ $errors->has('especialidade') ? ' has-error' : '' }}">
                                            <label for="especialidade" class="col-md-4 control-label">Chuyên khoa</label>
                                            <div class="col-md-6">
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
                                        <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                                            <label for="data" class="col-md-4 control-label">Thời gian khám</label>

                                            <div class="col-md-6">
                                                <input id="data" type="datetime-local"  class="form-control data"  name="data" value="{{ old('data') }}" required>

                                                @if ($errors->has('data'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('data') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- user_id-->
                                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                            <label for="user_id" class="col-md-4 control-label">Bác sĩ</label>
                                            <div class="col-md-6">             
                                                    <select class="user_id form-control" id="user_id" name="user_id" place>
                                                    <option value="0" disabled="true" selected="true">Bác sĩ</option>
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
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Đặt lịch
                                                </button>
                                                </button>
                                                <!-- <a href="/help/appointment/home"> -->
                                                <button type="reset" class="btn btn-warning " >
                                                    Xóa form
                                                </button>
                                                <!-- </a> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- @include('home.search') -->
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Danh sách bác sĩ mới</h3>
                        </div>
                    </div>
                    @include('home.slider')
                </div>    
                @endif
            </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>
    <script>
        $('div.alert').delay(5000).slideUp(300);
    </script>
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
                        url:'{!!URL::to('findUsersDateFromHome')!!}',
                        data:{'data': date, proficiency},
                        success: function(data){

                            let op ='<option value="0" selected disabled>Chọn bác sĩ</option>';

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
            
            $('.carousel[data-type="multi"] .item').first().addClass("active");
            
            $('.carousel[data-type="multi"] .item').each(function() {
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i = 0; i < 3; i++) {
                    next = next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }

                    next.children(':first-child').clone().appendTo($(this));
                }
            });

        
        });

    </script>
    </body>
</html>
