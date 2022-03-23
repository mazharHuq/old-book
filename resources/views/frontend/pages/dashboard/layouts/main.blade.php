
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

@include('frontend.pages.dashboard.layouts.partials.styles')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    @include('frontend.pages.dashboard.layouts.partials.mobile-menu')
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        @include('frontend.pages.dashboard.layouts.partials.sidebar')
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            @include('frontend.pages.dashboard.layouts.partials.topbar')
            <!-- END: Top Bar -->

                @yield('user-section')


        </div>
        <!-- END: Content -->
    </div>
    @include('frontend.pages.dashboard.layouts.partials.footer')
    <!-- BEGIN: JS Assets-->
    @include('frontend.pages.dashboard.layouts.partials.scripts')
    <!-- END: JS Assets-->
</body>

</html>
