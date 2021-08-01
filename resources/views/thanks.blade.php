<?php $page="booking-success";?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Đặt lịch khám</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Đặt lịch khám</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->
            
            <!-- Page Content -->
            <div class="content success-page-cont">
                <div class="container-fluid">
                
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                        
                            <!-- Success Card -->
                            <div class="card success-card">
                                <div class="card-body">
                                    <div class="success-cont">
                                        <i class="fas fa-check"></i>
                                        <h3>Đặt lịch khám thành công!</h3>
                                        <p>Đặt lịch khám với bác sĩ <strong>{{ $appointment->user->name }}</strong><br> vào lúc <strong>{{ $appointment->data }}</strong></p>
                                        <a href="/" class="btn btn-primary view-inv-btn">Về trang chủ</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Success Card -->
                            
                        </div>
                    </div>
                    
                </div>
            </div>      
            <!-- /Page Content -->
</div>
@endsection