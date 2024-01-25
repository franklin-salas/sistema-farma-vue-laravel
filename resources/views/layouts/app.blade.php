<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>INSPINIA | Basic Form</title>
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <!-- FooTable -->
    <link href="{{ asset('assets') }}/css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/ingreso.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
</head>

<body class="fixed-sidebar pace-done fixed-nav fixed-nav-basic">

<div id="wrapper">

@include('layouts.navbars.sidebar')

    <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
            @include('layouts.navbars.navbar')
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>{{ $page ?? ''}}</h2>
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item">
                        <a href="">{{ $section?? 'Dashboard' }}</a>
                    </li>
                   
                    @if (!empty($pageSlug))
                    <li class="breadcrumb-item">
                        <a>{{ $pageSlug   }}</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active">
                        <strong>{{ $page?? ''  }}</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight" id = "app">
            @yield('content')
            <!--            content             -->
           
        </div>
        <div class="footer">
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2018
            </div>
        </div>

    </div>
</div>


<!-- Mainly scripts -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{asset('assets/js/popper.min.js') }}"></script>
<script src="{{asset('assets/js/bootstrap.js') }}"></script>
<script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{asset('js/app.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src="{{asset('assets/js/inspinia.js') }}"></script>
<script src="{{asset('assets/js/plugins/pace/pace.min.js') }}"></script>
    <!-- Data picker -->
    <script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.es.js') }}"></script>
    <!-- FooTable -->
    <script src="{{asset('assets/js/plugins/footable/footable.all.min.js') }}"></script>
{{-- @stack('scripts') --}}
 {{-- check --}}
 <script src="{{asset('assets')}}/js/plugins/iCheck/icheck.min.js"></script>

<script>
    $(document).ready(function() {

        $('.footable').footable();

        $('#date_added').datepicker({
            'language' : 'es',
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
                });


    });

  

</script>


</body>

</html>
