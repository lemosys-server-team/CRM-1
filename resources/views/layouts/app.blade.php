<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600"> 
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
<meta name="keywords" content="@yield('meta_keywords', 'dua, marasiya, marisihya, aqa moula, aqa mola, namaaz, namaz, ghari, ghadi, rivaayat, hikayaat, sadaqah, notice me, ya hussain, ya husain, Alifi quran, photos aqa moula, namaaz time')" />

<meta name="description" content="@yield('meta_description', 'First audio website for the benefits of mumineen with dua and raza mubarak of aqa moula.')" />

<link href="{{ asset('frontend-theme/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend-theme/css/css-png.css') }}" rel="stylesheet">

<title>@yield('page_title', config('app.name', 'Laravel'))</title>

@php $favicon = getSetting('favicon'); @endphp
@if(isset($favicon) && $favicon!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$favicon))
<link rel="shortcut icon" href="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$favicon) }}">
@endif
@yield('styles')
</head>
<body>  
@yield('content') 
<!-- Begin Page Content -->         

<!-- Scripts -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-103955321-1', 'auto');
ga('send', 'pageview');

</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10552347-1");
pageTracker._trackPageview();
} catch(err) {}</script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var BASE_PATH = '{!! url("/") !!}/';
</script>
<script type="text/javascript" src="{{asset('frontend-theme/js/main.js')}}"></script>
<script type="text/javascript">
$(document).bind("contextmenu",function(e){
    return false;
  });
</script>
@yield('scripts')
</body>
</html>
