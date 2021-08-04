<?php error_reporting(0);?>
<!-- Loader -->
@if(Route::is(['map-grid','map-list']))
<div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div>
	@endif
	<!-- /Loader  -->
<div class="main-wrapper">
<!-- Header -->
<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="{{ url('/') }}" class="navbar-brand logo">
							<img src="{{asset('img/logo.png') }}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index" class="menu-logo">
								<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">Trang chủ</a>
							</li>
							<li class="has-submenu <?php if($page=="voice-call" || $page=="video-call" || $page=="search" || $page=="calendar" || $page=="components" || $page=="invoices1" || $page=="invoice-view" || $page=="blank-page" || $page=="login" || $page=="register1" || $page=="forgot-pswd") { echo 'active'; } ?>">
								<a href="">Giới thiệu <i class="fas fa-chevron-down"></i></a>								
							</li>		
							<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list" || $page=="search1" || $page=="doctor-profile" || $page=="booking" || $page=="checkout" || $page=="booking-success" || $page=="patient-dashboard" || $page=="favourites" || $page=="chat" || $page=="profile-settings" || $page=="change-password") { echo 'active'; } ?>">
								<a href="">Chức năng<i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list") { echo 'active'; } ?>">
										<a href="#">Tìm kiếm bác sĩ</a>
										<ul class="submenu">
											<li class="<?php if($page=="map-grid") { echo 'active'; } ?>"><a href="map-grid">Theo từ khóa</a></li>
											<li class="<?php if($page=="map-list") { echo 'active'; } ?>"><a href="map-list">Theo chuyên khoa</a></li>
										</ul>
									</li>
									<li class="<?php if($page=="search1") { echo 'active'; } ?>"><a href="/search-appointment">Truy vấn thông tin đặt lịch</a></li>
									<li class="<?php if($page=="doctor-profile") { echo 'active'; } ?>"><a href="doctor-profile">Đặt lịch</a></li>
									
								</ul>
							</li>

							
							<li class="has-submenu <?php if($page=="blog-list" || $page=="blog-grid" || $page=="blog-details") { echo 'active'; } ?>">
                            <a href="">Tin tức <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li class="<?php if($page=="blog-list") { echo 'active'; } ?>"><a href="blog-list">Thông  tin y tế hữu ích</a></li>
                                <li class="<?php if($page=="blog-grid") { echo 'active'; } ?>"><a href="blog-grid">Tình hình y tế trong và ngoài nước</a></li>
                                <li class="<?php if($page=="blog-details") { echo 'active'; } ?>"><a href="blog-details">Văn bản - Quy định</a></li>
                            </ul>
                        </li>
						
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Liên hệ</p>
								<p class="contact-info-header"> +2553 828 830</p>
							</div>
							@if (!Auth::check())
							<li class="nav-item">
							<a class="nav-link header-login" href="{{ url('/login') }}">Login </a>
							</li>
							@endif
						</li>
						
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->