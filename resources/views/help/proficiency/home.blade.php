@extends('layouts.app')
     @section('content')
     <style>
     </style>
            <div class="container">
              <div class="page-title">Danh sách Chuyên khoa</div>
                <div class="panel panel-default">                   
                   <div class="panel-body">
                      <div class="col-md-12 text-right">    
                          <form class="form-inline my-2 my-lg-0" >
                          <!-- <a href="{{ url('/help/proficiency/attach') }}" button type="button" class="btn btn-primary">
                              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                              Attach Proficiency to a Doctor
                              </button></a>  &nbsp; -->
                          <a href="{{ url('/help/proficiency/register') }}" button type="button" class="btn btn-primary  mr-auto p-2">
                              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                              Tạo mới
                              </button>
                          </a>   
                          <form  method="get" class="p-2">
                              <input class="form-control mr-sm-2" type="text" placeholder="Nhập từ khóa" name="s"
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
                                  <th>Chuyên khoa</th>
                                  <th>Ảnh đại diện</th>
                                  <th>Danh sách bác sĩ</th>
                                  <th>Thao tác</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach ($proficiencies as $proficiency)
                                  <tr>
                                  <td scope="row">{{$proficiency->id}}</td>
                                  <td scope="row">{{$proficiency->name}}</td>
                                  <td>
                                    <img src="{{ asset('uploads/chuyenkhoa/') . '/'.$proficiency->pro_avatar }}" width="100px" alt="">
                                  </td>
                                  <!-- <td>{{$proficiency->created_at}}</td> -->
                                  <td>
                                      <!-- <ul> -->
                                        @foreach($proficiency->user as $u)
                                        <a href="/doctor-profile/{{$u->slug}}">{{ $u->name }}</a>
                                        @endforeach
                                      <!-- </ul> -->
                                  </td>
                                  <td>
                                   <a href="edit/{{$proficiency->id}}" button type="button" class="btn btn-primary btn-sm" >Chỉnh sửa</button>
                                  </td>
                                   <td>
                                  <a href="/help/home/proficiency/delete/{{$proficiency->id}}" button type="button" class="btn btn-danger btn-sm" >Xóa</button>
                                  </td>
                                  </tr>     
                                  @endforeach
                                  </tbody> 
                      </table>
                      </div>
                      {{ $proficiencies->appends(['s' => $s])->links() }}
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