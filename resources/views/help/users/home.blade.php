@extends('layouts.app')
     @section('content')
     <style>
     </style>
            <div class="container">
                
                <div class="panel panel-default">
                  
                    <div class="panel-body">
                      <div class="col-md-15 text-right">    
                        <form class="form-inline my-2 my-lg-0" >
                          <a href="{{ url('/help/register') }}" button type="button" class="btn btn-primary mr-auto p-2">
                            <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                            Thêm bác sĩ
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
                                  <th>Bác sĩ</th>
                                  <th>Số điện thoại</th>
                                  <th>Email</th>
                                  <th>Chuyên khoa</th>
                                  <th>Giờ bắt đầu</th>
                                  <th>Giờ kết thúc</th>
                                  <th>Trạng thái</th>
                                  <th colspan="2">Thao tác</th>
                                  </tr>
                              </thead>
                              <tbody>
                              
                              @foreach ($doctors as $doctor)
                                  <tr>
                                  <th scope="row">{{$doctor->id}}</th>
                                  <td>{{$doctor->name}}</td>
                                  <td>{{$doctor->seg_social}}</td>
                                  <td>{{$doctor->email}}</td>      
                                  <td>
                                      <ul>
                                        @foreach($doctor->proficiencies as $p)
                                        <li><a href="#">{{ $p->name }}</a></li>
                                        @endforeach
                                      </ul>
                                  </td>
                                  <td>{{$doctor->hora_in}}</td>
                                  <td>{{$doctor->hora_out}}</td>
                                  <td>
                                      {{$doctor->active=="1" ? "Hoạt động" : "Bị khóa"}}
                                  </td>
                                  <td>
                                   <a href="edit/{{$doctor->id}}" button type="button" class="btn btn-primary btn-sm" >Chỉnh sửa</button>
                                  </td>
                                   <td>
                                    @if ($doctor->active=="1")
                                        <a href="delete/{{$doctor->id}}" button type="button" class="btn btn-danger btn-sm" >Vô hiệu hóa</button>
                                    @else
                                        <a href="active/{{$doctor->id}}" button type="button" class="btn btn-success btn-sm" >Kích hoạt</button>
                                    @endif
                                  
                                  </td>
                                  </tr>
                              @endforeach
                              
                              </tbody>
                                
                      </table>
                      </div>
                      
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