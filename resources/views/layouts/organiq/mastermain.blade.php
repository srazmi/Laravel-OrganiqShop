<!DOCTYPE html>
<html lang="fa">
<head>
   @include('layouts.organiq.partials.head')
</head>
<body>
<!-- LOADER -->
    @include('layouts.organiq.partials.loader')

    {{-- @yield('loader') --}}
<!-- END LOADER -->
<!-- START HEADER -->
<header class="header_wrap dark_skin main_menu_uppercase">
    @include('layouts.organiq.partials.header')
</header>
<!-- END HEADER -->
<div>
    @yield('content')
</div>
<!-- START SECTION BANNER -->
    @yield('banner')
<!-- END SECTION BANNER -->


<!-- START SECTION BANNER BOX -->
    @yield('bannerbox')
<!-- END SECTION BANNER BOX -->

<!-- START SECTION WHY CHOOSE US -->
    @yield('whychooseus')
<!-- END SECTION WHY CHOOSE US -->

<!-- START SECTION PRODUCT -->
    @yield('product')
<!-- END SECTION PRODUCT -->

<!-- START SECTION DEAL OF THE DAY -->
    @yield('takhfif')
<!-- END SECTION DEAL OF THE DAY -->

<!-- START SECTION FEATURE PRODUCT -->
    @yield('featureproduct')
<!-- END SECTION FEATURE PRODUCT -->

<!-- START SECTION TESTIMONIAL -->
    @yield('moshtary')
<!-- END SECTION TESTIMONIAL -->

<!-- START SECTION BLOG -->
    @yield('weblog')
<!-- END SECTION BLOG -->

<!-- START SECTION CLIENT LOGO -->
    @yield('logo')    
<!-- END SECTION CLIENT LOGO -->

<!-- START SECTION NEWSLATTER -->
    @yield('newslatter')    
<!-- END SECTION NEWSLATTER -->

<!-- START FOOTER -->
@include('layouts.organiq.partials.footer')
<!-- END FOOTER -->
@include('layouts.organiq.partials.footer-scripts')
</body>
</html>
