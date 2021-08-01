@extends('layouts.client')
@section('content')		
	<!-- Home Banner -->
	<section class="section section-search">
		<div class="container-fluid">
			<div class="banner-wrapper">
				<div class="banner-header text-center">
					<h1>Tìm bác sĩ & Đặt lịch khám</h1>
					<p>Nhập từ khóa tìm kiếm - Tên - Địa chỉ - Số điện thoại - Tên phòng khám ... và đặt lịch</p>
				</div>
                 
				<!-- Search -->
				<div class="search-box">
					<form action="search" method="get">
						<!-- <div class="form-group search-location">
							<input type="text" class="form-control" placeholder="Search Location">
							<span class="form-text">Based on your Location</span>
						</div> -->
						<div class="form-group search-info">
							<input type="text" class="form-control search-input" placeholder="Tên bác sĩ, Phòng khám, Địa chỉ... " name="s">
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
						<h2>Book Our Doctor</h2>
						<p>Lorem Ipsum is simply dummy text </p>
					</div>
					<div class="about-content">
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
						<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
						<a href="javascript:;">Read More..</a>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="doctor-slider slider">
					
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
									<a href="doctor-profile">Ruby Perrin</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
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
										<i class="fas fa-map-marker-alt"></i> Florida, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $300 - $1000 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
				
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-02.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">Darren Elder</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(35)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> Newyork, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $50 - $300 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
				
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-03.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">Deborah Angel</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(27)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> Georgia, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $100 - $400 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
				
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-04.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">Sofia Brient</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">MBBS, MS - General Surgery, MCh - Urology</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(4)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> Louisiana, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $150 - $250 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
						
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-05.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">Marvin Campbell</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">MBBS, MD - Ophthalmology, DNB - Ophthalmology</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(66)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> Michigan, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $50 - $700 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
						
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-06.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">Katharine Berthold</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(52)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> Texas, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $100 - $500 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
						
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-07.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">Linda Tobin</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(43)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> Kansas, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $100 - $1000 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
						
						<!-- Doctor Widget -->
						<div class="profile-widget">
							<div class="doc-img">
								<a href="doctor-profile">
									<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-08.jpg">
								</a>
								<a href="javascript:void(0)" class="fav-btn">
									<i class="far fa-bookmark"></i>
								</a>
							</div>
							<div class="pro-content">
								<h3 class="title">
									<a href="doctor-profile">Paul Richard</a> 
									<i class="fas fa-check-circle verified"></i>
								</h3>
								<p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
								<div class="rating">
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star filled"></i>
									<i class="fas fa-star"></i>
									<span class="d-inline-block average-rating">(49)</span>
								</div>
								<ul class="available-info">
									<li>
										<i class="fas fa-map-marker-alt"></i> California, USA
									</li>
									<li>
										<i class="far fa-clock"></i> Available on Fri, 22 Mar
									</li>
									<li>
										<i class="far fa-money-bill-alt"></i> $100 - $400 
										<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
									</li>
								</ul>
								<div class="row row-sm">
									<div class="col-6">
										<a href="doctor-profile" class="btn view-btn">View Profile</a>
									</div>
									<div class="col-6">
										<a href="booking" class="btn book-btn">Book Now</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Doctor Widget -->
						
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
	  