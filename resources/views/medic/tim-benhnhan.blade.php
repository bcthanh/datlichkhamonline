@extends('layouts.appdoctor')
     @section('content')
     <style>
     </style>
            <div class="container">
              <div class="page-title">Thông tin bệnh nhân</div>
                <div class="panel panel-default">
                    
                         <div class="panel-body">
                            <div class="col-md-15 text-right">    
                                <form class="form-inline my-2 my-lg-0" >
                                    <form  method="get">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="s"
                                    values=" {{ isset($s) ? $s : '' }} ">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>                  
                                </form>
                                    </form>        
                               </div>  
                                <p>
                                <div style="overflow-x:auto;">
                            <table class="table table-striped table-responsive" id="myTable" >
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Họ và tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Thời gian khám</th>
                                        <th>Ghi chú</th>
                                        <!-- <th>Bác sĩ</th> -->
                                        <th>Trạng thái</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                        <th scope="row">{{$appointment->id}}</th>
                                        <td>{{$appointment->name}}</td>
                                        <td>{{$appointment->sns}}</td>
                                        <td>{{$appointment->data}}</td>
                                        <td>{{$appointment->especialidade}}</td>
                                        @if ($appointment->realizada == 0)
                                            <td>Đang chờ</td>
                                        @else 
                                            <td>Hoàn thành</td>
                                        @endif
                                            
                                            
                                        @if ($appointment->realizada == 0)
                                        <td>
                                         <a href="edit/{{$appointment->id}}" button type="button" class="btn btn-primary btn-sm" >Thực hiện</button>
                                        </td>
                                         <td>
                                        <a href="/medic/home/appointment/show/{{$appointment->id}}" button type="button" class="btn btn-success btn-sm" >Xem</button>
                                        </td>
                                        @elseif ($appointment->realizada == 1)
                                        <td><a button type="button" class="btn btn-primary btn-sm disabled" disabled>Thực hiện</button>
                                        </td>
                                        <td>
                                        <a href="/medic/home/appointment/show/{{$appointment->id}}" button type="button" class="btn btn-success btn-sm disabled" >Xem</button>
                                        </td>
                                        @endif
                                       
                                        </tr>
                                    @endforeach
                                   
                                    </tbody>
                                     
                            </table>
                            </div>
                            {{ $appointments->appends(['s' => $s])->links() }}
                        </div>
                    </div>
            </div>

<!--            <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>-->
@endsection