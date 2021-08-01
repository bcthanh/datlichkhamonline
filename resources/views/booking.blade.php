<?php $page="booking";?>
@extends('layouts.client')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
									<li class="breadcrumb-item active" aria-current="page">Đặt lịch</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Đặt lịch</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile" class="booking-doc-img">
											<img src="{{ asset('assets/img/doctors/doctor-thumb-02.jpg') }}" alt="{{ $doctor->name }}">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile/{{ $doctor->slug }}">{{ $doctor->name }}</a></h4>
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{ $doctor->profile->clinic_address }}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<?php $ngaytrongtuan = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"] ?>
								<div class="col-12 col-sm-4 col-md-6">
									<h4 class="mb-1">Hôm nay: {{ $ngaytrongtuan[Carbon\Carbon::now()->dayOfWeek] }} Ngày {{ Carbon\Carbon::now()->day }} tháng {{ Carbon\Carbon::now()->month }} năm {{ Carbon\Carbon::now()->year }}</h4>
									<p class="text-muted">Chọn ngày để đặt lịch</p>
								</div>
								<div class="col-12 col-sm-6 col-md-4 text-sm-right">

									<div class="cal-icon"><input type="text" class="form-control" id="bookingdate" placeholder="Chọn ngày đặt lịch"></div>
									<input type="hidden" value="{{ $doctor->id}}" name="" id="doctorid">								
								</div>
                            </div>
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Day Slot -->
											<div class="day-slot">
												Các khung giờ cho ngày <span class="ngayduocchon"> {{ Carbon\Carbon::now()->format('d/m/y') }}</span>
												<br>
												<strong>Chọn thời điểm cần khám và nhấn "Đặt lịch khám"</strong>	
											</div>
											<!-- /Day Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
													@foreach ($slots as $slot)
													<li>
														<a class="timing" href="#">
															<span>{{ $slot }}</span> 
														</a>					
													</li>
													@endforeach
												</ul>
											</div>
											<!-- /Time Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Content -->
								
							</div>
							<!-- /Schedule Widget -->
							<form action="/datlichkham" method="post">
								{{ csrf_field() }}
								<!-- Personal Information -->
								<div id="info-widget">
									<h4 class="card-title">Thông tin Người đặt lịch</h4>
									<div class="row">
										<div class="col-md-6 col-sm-12">
											<div class="form-group card-label">
												<label>Họ và tên</label>
												<input class="form-control" type="text" name="hoten">
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group card-label">
												<label>Số điện thoại</label>
												<input class="form-control" type="text" name="sdt">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group card-label">
												<label>Ghi chú</label>
												<textarea class="form-control"name="ghichu"></textarea>
											</div>
										</div>
										<!-- hidden text -->
										<input type="hidden" name="bacsi_id" value="{{ $doctor->id }}" id="bacsi_id">
										<input type="hidden" name="giokham" id="giokham">
									</div>
								</div>
								<!-- Submit Section -->
								<div class="submit-section proceed-btn text-right">
									<button href="checkout" id="checkout" disabled="true" class="btn btn-primary submit-btn" >Đặt lịch khám</button>
								</div>
								<!-- /Submit Section -->
							</form>
						</div>
					</div>
				</div>

			</div>		
            <!-- /Page Content -->
</div>
@endsection