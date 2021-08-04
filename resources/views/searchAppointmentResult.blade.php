<?php $page="search1";?>
@extends('layouts.client')
@section('content')
	<!-- Breadcrumb -->
    <div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Tìm thấy {{ count($appointementList)}} bản ghi đối với số điện thoại {{ $s }}
							
						</h2>
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<!-- sorb herr -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
					<div class="row">							
				
					<div class="col-md-12">
						
						<form  method="post" class="p-2" action="/search-appointment-result">
							{{ csrf_field() }}
	                      <input class="form-control mr-sm-2" type="text" placeholder="Nhập số điện thoại cần tìm" name="s"
	                      values=" {{ isset($s) ? $s : '' }} ">
	                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm Thông tin đặt lịch khám</button>                  
	                  </form>
						
					</div>
				</div>
					<div class="row">							
						
						<div class="col-md-12">
							
							<!-- Doctor Widget -->
							<table class="table table-striped table-responsive" id="myTable" >
                              <thead>
                                  <tr>
                                  <th>#</th>
                                  <th>Tên bệnh nhân</th>
                                  <th>Số điện thoại</th>
                                  <th>Thời gian khám</th>
                                  <th>Bác sĩ</th>
                                  <th>Ghi chú</th>
                                  <th>Trạng thái</th>
                                  <th>Triệu chứng</th>
                                  <th>Chẩn đoán</th>
                                  <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                              
                              @if (count($appointementList) > 0)
							@foreach ($appointementList as $appointment)
                                  <tr>
                                  <th scope="row">{{$appointment->id}}</th>
                                  <td>{{$appointment->name}}</td>
                                  <td>{{$appointment->sns}}</td>
                                  <td>{{$appointment->data}}</td>

                                  <td>{{$appointment->user->name}}</td>
                                  <td>{{$appointment->especialidade }}</td>
                                  
                                  @if ($appointment->realizada == 0)
                                      <td>Đang chờ</td>
                                  @else 
                                      <td>Hoàn thành</td>
                                  @endif
                                  
                                  
                                  <td>{{$appointment->sintomas }}</td>
                                  <td>{{$appointment->diagnostico }}</td>
                                  
                                  </tr>
                              @endforeach
                              @endif
                              </tbody>
                                
                      </table>
							<!-- /Doctor Widget -->
							
							
						</div>
					</div>

				</div>

			</div>		
            <!-- /Page Content -->
</div>
@endsection