@extends('layouts.app')
     @section('content')
     <style>
     </style>
            <div class="container">
                <div class="page-title">Danh sách Lịch hẹn khám</div>
                <div class="panel panel-default">
                  
                    <div class="panel-body">
                      <div class="col-md-12 text-right">    
                        <form class="form-inline my-2 my-lg-0" >
                          <a href="{{ url('/help/appointment/register') }}" button type="button" class="btn btn-primary mr-auto p-2">
                            <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                            Tạo lịch hẹn
                            </button>
                          </a>
                          <form  method="get" class="p-2">
                              <input class="form-control mr-sm-2 justify-content-end" type="text" placeholder="Nhập từ khóa" name="s"
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
                                  <th>Tên bệnh nhân</th>
                                  <th>Số điện thoại</th>
                                  <th>Thời gian khám</th>
                                  <th>Chuyên khoa</th>
                                  <th>Bác sĩ</th>
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
                                  @if(isset($appointment->proficiency->name))
                                  <td>{{$appointment->proficiency->name }}</td>
                                  @else
                                  <td>...</td>
                                  @endif
                                  
                                  <td>{{$appointment->user->name}}</td>
                                  
                                  @if ($appointment->realizada == 0)
                                      <td>Đang chờ</td>
                                  @else 
                                      <td>Hoàn thành</td>
                                  @endif
                                  
                                  
                                  @if ($appointment->realizada == 0)

                                  <td>
                                    <a href="edit/{{$appointment->id}}" button type="button" class="btn btn-primary btn-sm" >Chỉnh sửa</button>
                                  </td>
                                    <td>
                                  <a href="/help/home/appointment/delete/{{$appointment->id}}" button type="button" class="btn btn-danger btn-sm" >Xóa</button>
                                  </td>
                                  @elseif ($appointment->realizada == 1)
                                  <td><a button type="button" class="btn btn-primary btn-sm" disabled>Chỉnh sửa</button>
                                  </td>
                                  <td>
                                  <a button type="button" class="btn btn-danger btn-sm" disabled>Xóa</button>
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

           <script>
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
</script>
@endsection