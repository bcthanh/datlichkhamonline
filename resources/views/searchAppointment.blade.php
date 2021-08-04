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
					<h2 class="breadcrumb-title">
					
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

		</div>

	</div>		
    <!-- /Page Content -->
</div>
@endsection