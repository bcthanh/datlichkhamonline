<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>
  @if(Route::is(['map-grid']))
  <body class="map-page">
  @endif
@include('partials.header')
@yield('content')
@if(!Route::is(['chat-doctor','map-grid','map-list','chat','voice-call','video-call']))
@include('partials.footer')
@endif
@include('partials.footer-scripts')
  </body>
</html>
<script>
$(document).ready(function(){
  // alert(1);
 /*$('.submenu li a').click(function(){
   $(.submenu li a).removeClass("active");
   $(this).addClass("active");
   $('.has-submenu a').removeClass("active");
   $('.has-submenu a').addClass("active");
   
   //$(this).toggleClass("active");
 });*/
});
</script>