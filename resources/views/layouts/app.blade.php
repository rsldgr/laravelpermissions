<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

    </head>

    <body>

            <!-- Begin page -->
            <div id="wrapper">
    
                
                @include('partials.topbar',['title'=>'Starter page'])
                
                @include('partials.left-sidebar')
    
                <!-- ============================================================== -->
                <!-- Start Page Content here -->
                <!-- ============================================================== -->
    
                <div class="content-page">
                    <div class="content">
    
                        <!-- Start Content-->
                        <div class="container-fluid">
    
                            
                            
                        </div> <!-- container-fluid -->
    
                    </div> <!-- content -->
                    @include('partials.footer')
    
                </div>
    
                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->
    
    
            </div>
            <!-- END wrapper -->
    
            @include('partials.right-sidebar')
            
        
    </body>
</html>