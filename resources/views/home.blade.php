@extends('layouts.client')
@section('content')		
	<!-- Home Banner -->
	<section class="section section-search">
		<div class="container-fluid">
			<div class="banner-wrapper">
				<div class="banner-header text-center">
					<h1>Tìm bác sĩ & Đặt lịch khám</h1>
					<p>Nhập tên bác sĩ (ví dụ: Tuấn) để tìm kiếm</p>
				</div>
                 
				<!-- Search -->
				<div class="search-box">
					<form action="search" method="get">
						<!-- <div class="form-group search-location">
							<input type="text" class="form-control" placeholder="Search Location">
							<span class="form-text">Based on your Location</span>
						</div> -->
						<div class="form-group search-info">
							<input type="text" class="form-control search-input" placeholder="Tên bác sĩ" name="s">
							<!-- <span class="form-text">Ví dụ: Nguyễn Đình Tuyến</span> -->
						</div>
						<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Tìm kiếm</span></button>
					</form>
				</div>
				<!-- /Search -->
				
			</div>
		</div>
	</section>
	<!-- /Home Banner -->
	  
	<!-- Clinic and Specialities -->
	<section class="section section-specialities">
		<div class="container-fluid">
			<div class="section-header text-center">
				<h2>Danh sách các chuyên khoa</h2>
				<p class="sub-title">Click vào chuyên khoa để xem danh sách các bác sĩ thuộc chuyên khoa này</p>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-9">
					<!-- Slider -->
					<div class="specialities-slider slider">
						@foreach ($proficiencies as $profic)
						<a href="/dsbacsi/{{$profic->id}}">
						<!-- Slider Item -->
						<div class="speicality-item text-center">
							<div class="speicality-img">
								<img src="{{ asset('uploads/chuyenkhoa') . '/' . $profic->pro_avatar }}" class="img-fluid" alt="Speciality">
								<span><i class="fa fa-circle" aria-hidden="true"></i></span>
							</div>
							<p>{{ $profic->name }}</p>
						</div>	
						<!-- /Slider Item -->
						</a>
						@endforeach						
						
						
					</div>
					<!-- /Slider -->
					
				</div>
			</div>
		</div>   
	</section>	 
	<!-- Clinic and Specialities -->
  
	<!-- Popular Section -->
	<section class="section section-doctor">
		<div class="container-fluid">
		   <div class="row">
				<div class="col-lg-4">
					<div class="section-header ">
						<h2>Danh sách bác sĩ mới</h2>
						<p>Các bác sĩ vừa ham gia vào hệ thống chúng tôi</p>
					</div>
					<div class="about-content">
						<p>Hệ thống giúp các bác sĩ dễ dàng tiếp cận đến các bệnh nhân có nhu cầu</p>
						<p>Đồng thời, thông qua hệ thống bệnh nhân dễ dàng đặt lịch hẹn, tiết kiệm thời gian, công sức trong việc khám chữa bệnh</p>					
						<a href="javascript:;">Xem thêm..</a>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="doctor-slider slider">
					
						@foreach ($newdoctors as $doctor)
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-01.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">{{ $doctor->name }}</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">{{ $doctor->profile->clinic_name }}</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<span class="d-inline-block average-rating">(17)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> {{ $doctor->profile->clinic_address }}
									</li>
									<li>
										<i class="far fa-clock"></i> Khám tất cả các ngày trong tuần
									</li>
									<<!-- li>
										<i class="far fa-money-bill-alt"></i> $300 - $1000 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li> -->
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="/doctor-profile/{{$doctor->slug}}" class="btn view-btn">Xem hồ sơ</a>
									</div>
									<div class="col-6">
										<a href="/booking/{{$doctor->slug}}" class="btn book-btn">Đặt lịch khám</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
						@endforeach
						
						
					</div>
				</div>
		   </div>
		</div>
	</section>
	<!-- /Popular Section -->  
   
	<!-- Blog Section -->
   <section class="section section-blogs">
		<div class="container-fluid">
		
			<!-- Section Header -->
			<div class="section-header text-center">
				<h2>Blogs and News</h2>
				<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<!-- /Section Header -->
			
			<div class="row blog-grid-row">
				<div class="col-md-6 col-lg-3 col-sm-12">
				
					<!-- Blog Post -->
					<div class="blog grid-blog">
						<div class="blog-image">
							<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image"></a>
						</div>
						<div class="blog-content">
							<ul class="entry-meta meta-item">
								<li>
									<div class="post-author">
										<a href="doctor-profile"><img src="assets/img/doctors/doctor-thumb-01.jpg" alt="Post Author"> <span>Dr. Ruby Perrin</span></a>
									</div>
								</li>
								<li><i class="far fa-clock"></i> 4 Dec 2019</li>
							</ul>
							<h3 class="blog-title"><a href="blog-details">Doccure – Making your clinic painless visit?</a></h3>
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
						</div>
					</div>
					<!-- /Blog Post -->
					
				</div>
				<div class="col-md-6 col-lg-3 col-sm-12">
				
					<!-- Blog Post -->
					<div class="blog grid-blog">
						<div class="blog-image">
							<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-02.jpg" alt="Post Image"></a>
						</div>
						<div class="blog-content">
							<ul class="entry-meta meta-item">
								<li>
									<div class="post-author">
										<a href="doctor-profile"><img src="assets/img/doctors/doctor-thumb-02.jpg" alt="Post Author"> <span>Dr. Darren Elder</span></a>
									</div>
								</li>
								<li><i class="far fa-clock"></i> 3 Dec 2019</li>
							</ul>
							<h3 class="blog-title"><a href="blog-details">What are the benefits of Online Doctor Booking?</a></h3>
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
						</div>
					</div>
					<!-- /Blog Post -->
					
				</div>
				<div class="col-md-6 col-lg-3 col-sm-12">
				
					<!-- Blog Post -->
					<div class="blog grid-blog">
						<div class="blog-image">
							<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-03.jpg" alt="Post Image"></a>
						</div>
						<div class="blog-content">
							<ul class="entry-meta meta-item">
								<li>
									<div class="post-author">
										<a href="doctor-profile"><img src="assets/img/doctors/doctor-thumb-03.jpg" alt="Post Author"> <span>Dr. Deborah Angel</span></a>
									</div>
								</li>
								<li><i class="far fa-clock"></i> 3 Dec 2019</li>
							</ul>
							<h3 class="blog-title"><a href="blog-details">Benefits of consulting with an Online Doctor</a></h3>
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
						</div>
					</div>
					<!-- /Blog Post -->
					
				</div>
				<div class="col-md-6 col-lg-3 col-sm-12">
				
					<!-- Blog Post -->
					<div class="blog grid-blog">
						<div class="blog-image">
							<a href="blog-details"><img class="img-fluid" src="assets/img/blog/blog-04.jpg" alt="Post Image"></a>
						</div>
						<div class="blog-content">
							<ul class="entry-meta meta-item">
								<li>
									<div class="post-author">
										<a href="doctor-profile"><img src="assets/img/doctors/doctor-thumb-04.jpg" alt="Post Author"> <span>Dr. Sofia Brient</span></a>
									</div>
								</li>
								<li><i class="far fa-clock"></i> 2 Dec 2019</li>
							</ul>
							<h3 class="blog-title"><a href="blog-details">5 Great reasons to use an Online Doctor</a></h3>
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
						</div>
					</div>
					<!-- /Blog Post -->
					
				</div>
			</div>
			<div class="view-all text-center"> 
				<a href="blog-list" class="btn btn-primary">View All</a>
			</div>
		</div>
	</section>
	<!-- /Blog Section -->			
   
</div>
<!-- /Main Wrapper -->
@endsection
	  