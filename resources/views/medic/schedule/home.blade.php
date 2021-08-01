@extends('layouts.appdoctor')

@section('content')
<div class="card-body">
	<h4 class="card-title">Thiết lập Giờ khám theo ngày trong tuần</h4>
	<div class="profile-box">

		<div class="row">
			<div class="col-md-12">
				<div class="card schedule-widget mb-0">
				
					<!-- Schedule Header -->
					<div class="schedule-header">
					
						<!-- Schedule Nav -->
						<div class="schedule-nav">
							<ul class="nav nav-tabs nav-justified">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#slot_sunday">Chủ Nhật</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#slot_monday">Thứ Hai</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#slot_tuesday">Thứ Ba</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#slot_wednesday">Thứ Tư</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#slot_thursday">Thứ Năm</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#slot_friday">Thứ Sáu</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#slot_saturday">Thứ Bảy</a>
								</li>
							</ul>
						</div>
						<!-- /Schedule Nav -->
						
					</div>
					<!-- /Schedule Header -->
					
					<!-- Schedule Content -->
					<div class="tab-content schedule-cont">
					
						<!-- Sunday Slot -->
						<div id="slot_sunday" class="tab-pane fade show active">
							<h4 class="card-title d-flex justify-content-between">
								<span>Các khung giờ khám</span> 
								<a class="edit-link add_time_slot" data-toggle="modal" href="#" diw="0"><i class="fa fa-edit mr-1"></i> Chỉnh sửa khung giờ khám</a>
							</h4>
							<div class="thoiluongkham">
								@if (count($sun_slots) > 0)
									Thời lượng mỗi lượt khám {{ $sun_slots[0]->minutes_per_patient }} phút
								@endif
							</div>
							<div class="doc-times">
								@foreach ($sun_slots as $slot)
								<div class="doc-slot-list">{{ $slot->starting_time . " - " . $slot->ending_time}}</div>
								@endforeach
							</div>
						</div>
						<!-- /Sunday Slot -->

						<!-- Monday Slot -->
						<div id="slot_monday" class="tab-pane fade">
							<h4 class="card-title d-flex justify-content-between">
								<span>Các khung giờ khám</span> 
								<a class="edit-link add_time_slot" data-toggle="modal" href="#" diw="1"><i class="fa fa-edit mr-1"></i>Chỉnh sửa khung giờ khám</a>
							</h4>
							
							<div class="thoiluongkham">
								@if (count($mon_slots) > 0)
									Thời lượng mỗi lượt khám {{ $mon_slots[0]->minutes_per_patient }} phút
								@endif
							</div>
							<!-- Slot List -->
							<div class="doc-times">
							@foreach ($mon_slots as $slot)
								<div class="doc-slot-list">{{ $slot->starting_time . " - " . $slot->ending_time}}</div>
							@endforeach
							</div>
							<!-- /Slot List -->
							
						</div>
						<!-- /Monday Slot -->

						<!-- Tuesday Slot -->
						<div id="slot_tuesday" class="tab-pane fade">
							<h4 class="card-title d-flex justify-content-between">
								<span>Các khung giờ khám</span> 
								<a class="edit-link add_time_slot" data-toggle="modal" href="#" diw="2"><i class="fa fa-edit mr-1"></i> Chỉnh sửa khung giờ khám</a>
							</h4>
							<div class="thoiluongkham">
								@if (count($tue_slots) > 0)
									Thời lượng mỗi lượt khám {{ $tue_slots[0]->minutes_per_patient }} phút
								@endif
							</div>
							<div class="doc-times">
							@foreach ($tue_slots as $slot)
								<div class="doc-slot-list">{{ $slot->starting_time . " - " . $slot->ending_time}}</div>
							@endforeach
							</div>
						</div>
						<!-- /Tuesday Slot -->

						<!-- Wednesday Slot -->
						<div id="slot_wednesday" class="tab-pane fade">
							<h4 class="card-title d-flex justify-content-between">
								<span>Các khung giờ khám</span> 
								<a class="edit-link add_time_slot" data-toggle="modal" href="#" diw="3"><i class="fa fa-edit mr-1"></i> Chỉnh sửa khung giờ khám</a>
							</h4>
							<div class="thoiluongkham">
								@if (count($wed_slots) > 0)
									Thời lượng mỗi lượt khám {{ $wed_slots[0]->minutes_per_patient }} phút
								@endif
							</div>
							<div class="doc-times">
							@foreach ($wed_slots as $slot)
								<div class="doc-slot-list">{{ $slot->starting_time . " - " . $slot->ending_time}}</div>
							@endforeach
							</div>
						</div>
						<!-- /Wednesday Slot -->

						<!-- Thursday Slot -->
						<div id="slot_thursday" class="tab-pane fade">
							<h4 class="card-title d-flex justify-content-between">
								<span>Các khung giờ khám</span> 
								<a class="edit-link add_time_slot" data-toggle="modal" href="#"  diw="4"><i class="fa fa-edit mr-1"></i> Chỉnh sửa khung giờ khám</a>
							</h4>
							<div class="thoiluongkham">
								@if (count($thu_slots) > 0)
									Thời lượng mỗi lượt khám {{ $thu_slots[0]->minutes_per_patient }} phút
								@endif
							</div>
							<div class="doc-times">
							@foreach ($thu_slots as $slot)
								<div class="doc-slot-list">{{ $slot->starting_time . " - " . $slot->ending_time}}</div>
							@endforeach
							</div>
						</div>
						<!-- /Thursday Slot -->

						<!-- Friday Slot -->
						<div id="slot_friday" class="tab-pane fade">
							<h4 class="card-title d-flex justify-content-between">
								<span>Các khung giờ khám</span> 
								<a class="edit-link add_time_slot" data-toggle="modal" href="#"  diw="5"><i class="fa fa-edit mr-1"></i> Chỉnh sửa khung giờ khám</a>
							</h4>
							<div class="thoiluongkham">
								@if (count($fri_slots) > 0)
									Thời lượng mỗi lượt khám {{ $fri_slots[0]->minutes_per_patient }} phút
								@endif
							</div>
							<div class="doc-times">
							@foreach ($fri_slots as $slot)
								<div class="doc-slot-list">{{ $slot->starting_time . " - " . $slot->ending_time}}</div>
							@endforeach
							</div>
						</div>
						<!-- /Friday Slot -->

						<!-- Saturday Slot -->
						<div id="slot_saturday" class="tab-pane fade">
							<h4 class="card-title d-flex justify-content-between">
								<span>Các khung giờ khám</span> 
								<a class="edit-link add_time_slot" data-toggle="modal" href="#" diw="6"><i class="fa fa-edit mr-1"></i> Chỉnh sửa khung giờ khám</a>
							</h4>
							<div class="thoiluongkham">
								@if (count($sat_slots) > 0)
									Thời lượng mỗi lượt khám {{ $sat_slots[0]->minutes_per_patient }} phút
								@endif
							</div>
							<div class="doc-times">
							@foreach ($sat_slots as $slot)
								<div class="doc-slot-list">{{ $slot->starting_time . " - " . $slot->ending_time}}</div>
							@endforeach
							</div>
						</div>
						<!-- /Saturday Slot -->

					</div>
					<!-- /Schedule Content -->
					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add Time Slot Modal -->
<div class="modal fade custom-modal" id="modal_add_time_slot">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Thiết lập thời gian khám bệnh ngày <span id="thu" style="font-weight: bold; "></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="hours-info">
						<div class="row form-row hours-cont">
							<div class="col-12 col-md-10">
								<div class="form-group">
									<label>Thời lượng ca khám</label>
									<select class="form-control" name="duration">
										<option>-</option>
										<option value="10">10 phút</option>
										<option value="15">15 phút</option>  
										<option value="30">30 phút</option>
										<option value="60">60 phút</option>
									</select>
									<input type="hidden" name="diw" id="thu_hidden" name="diw">
								</div>
								<div class="row form-row">
									<div class="col-12 col-md-6">
										
										<div class="form-group">
											<label>Bắt đầu khám</label>
											<select class="form-control starts" name="starts[]">
												<option>-</option>
												<option value="07:00">07:00</option>
												<option value="07:30">07:30</option>
												<option value="08:00">08:00</option>
												<option value="08:30">08:30</option>
												<option value="09:00">90:00</option>
												<option value="09:30">09:30</option>
												<option value="10:00">10:00</option>
												<option value="10:30">10:30</option>
												<option value="11:00">11:00</option>
												<option value="11:30">11:30</option>
												<option value="12:00">12:00</option>
												<option value="12:30">12:30</option>
												<option value="13:00">13:00</option>
												<option value="13:30">13:30</option>
												<option value="14:00">14:00</option>
												<option value="14:30">14:30</option>
												<option value="15:00">15:00</option>
												<option value="15:30">15:30</option>
												<option value="16:00">16:00</option>
												<option value="16:30">16:30</option>
												<option value="17:00">17:00</option>
												<option value="17:30">17:30</option>
												<option value="18:00">18:00</option>
												<option value="18:30">18:30</option>
												<option value="19:00">19:00</option>
												<option value="19:30">19:30</option>
												<option value="20:00">20:00</option>
												<option value="20:30">20:30</option>
												<option value="21:00">21:00</option>
												<option value="21:30">21:30</option>
											</select>
										</div> 
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label>Kết thúc khám</label>
											<select class="form-control ends" name="ends[]">
												<option>-</option>
												<option value="07:00">07:00</option>
												<option value="07:30">07:30</option>
												<option value="08:00">08:00</option>
												<option value="08:30">08:30</option>
												<option value="09:00">90:00</option>
												<option value="09:30">09:30</option>
												<option value="10:00">10:00</option>
												<option value="10:30">10:30</option>
												<option value="11:00">11:00</option>
												<option value="11:30">11:30</option>
												<option value="12:00">12:00</option>
												<option value="12:30">12:30</option>
												<option value="13:00">13:00</option>
												<option value="13:30">13:30</option>
												<option value="14:00">14:00</option>
												<option value="14:30">14:30</option>
												<option value="15:00">15:00</option>
												<option value="15:30">15:30</option>
												<option value="16:00">16:00</option>
												<option value="16:30">16:30</option>
												<option value="17:00">17:00</option>
												<option value="17:30">17:30</option>
												<option value="18:00">18:00</option>
												<option value="18:30">18:30</option>
												<option value="19:00">19:00</option>
												<option value="19:30">19:30</option>
												<option value="20:00">20:00</option>
												<option value="20:30">20:30</option>
												<option value="21:00">21:00</option>
												<option value="21:30">21:30</option>
											</select>
										</div> 
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="add-more mb-3">
						<a href="javascript:void(0);" class="add-hours"><i class="fa fa-edit mr-1"></i>Thêm khung giờ khám</a>
					</div>
					<div class="submit-section text-center">
						<button type="submit" id="luugiokham" class="btn btn-primary submit-btn">Lưu</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Time Slot Modal -->

<script type="text/javascript">	
$(document).ready(function(){ 

	let grandfather_div = null;	//de xac dinh la nhan chon add time slot cho nao
	$('.edit_time_slot').click(function(){
		event.preventDefault();
		// hien thi modal cho edit thoi gian - time slot
		$('#modal_edit_time_slot').modal({show:true});
	});

	//xu ly khi click vao link thieet lap (moi - hoac lai) thoi gian kham cho 1 ngay
	$('.add_time_slot').click(function(){
		grandfather_div = $(this).parent().parent();
		// console.log('grand father div: ', grandfather_div);

		event.preventDefault();
		// hien thi modal cho edit thoi gian - time slot
		let thutrongtuan = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ 5', 'Thứ 6', 'Thứ 7'];
		console.log($(this).attr('diw'));
		$('#thu_hidden').val($(this).attr('diw'));
		$('#thu').html(thutrongtuan[$(this).attr('diw')]);
		$('#modal_add_time_slot').modal({show:true});
	});

	//xu ly su kien khi luu thoi gian kham
	$('#luugiokham').click(function(){

		var postForm = { //Fetch form data
	        duration     : $('select[name=duration]').val(), //Store name fields value
	        diw     : $('input[name=diw]').val(), 
	        // starts     : $('select[name=starts]').val(), 
	        // ends     : $('select[name=ends]').val(),
	        _token: '{{csrf_token()}}'
	    };
	    
	    postForm.starts = [];
	    $("select[name^='starts']").each(function() {
		    console.log($(this).val());
		    postForm.starts.push($(this).val());
		});

	    postForm.ends = [];
		$("select[name^='ends']").each(function() {
		    console.log($(this).val());
		    postForm.ends.push($(this).val());
		});

		console.log(postForm);

		//kiem tra - validate khung thoi gian truoc khi submit
		let validate_timeslot = checkslottime(postForm.starts, postForm.ends);

		if (validate_timeslot){
			$.ajax({ //Process the form using $.ajax()
				type      : 'POST', //Method type
				url       : '{!!URL::to('schedule-settings')!!}',
				data      : postForm, //Forms name
				// dataType  : 'json',
				success   : function(data) {
					
					console.log(data);

					//cap nhap gia tri trong phan hien thi
					$('#modal_add_time_slot').modal('hide');
					console.log(grandfather_div);
					//data luc nay la danh sach slots
					// grandfather_div.remove("p.text-muted").append(data);
					let doctimes_dom = grandfather_div.find(".doc-times"); 
					// pp.html("Bui Cong Thanh");
					// pp.remove();

					let timeslot = "";

					$.each(data, function(i, item) {
						timeslot += "<div class='doc-slot-list'>";
						timeslot += item.starting_time + " - " + item.ending_time;
						timeslot += "</div>";
					});
					// timeslot += "</div>";
					doctimes_dom.html(timeslot);

					//cap nhap cho thoiluongkham
					let thoiluongkham_dom = grandfather_div.find(".thoiluongkham");
					thoiluongkham_dom.html("Thời lượng mỗi lượt khám " + postForm.duration + " phút");
					// if (!data.success) { //If fails
					// 	if (data.errors.name) { //Returned if any error from process.php
					// 		$('.throw_error').fadeIn(1000).html(data.errors.name); //Throw relevant error
					// 	}
					// }
					// else {
					// 		$('#success').fadeIn(1000).append('<p>' + data.posted + '</p>'); //If successful, than throw a success message
					// 	}
					}
			});
		} else {
			alert("Có sự chồng chéo giữa các khung giờ - Hoặc thời gian kết thúc trước thời gian bắt đầu trong 1 khung giờ - Hoặc không chọn 1 trong 2");
		}

	    
	    event.preventDefault(); //Prevent the default submit	   
	});

	function checkslottime(start_array, end_array){
		//se hien thuc sau
		return true;
	}
});


</script>
@endsection
