@section('logo')
<section class="small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center">
                    <div class="heading_s1 text-center animation" data-animation="fadeInUp"
                         data-animation-delay="0.02s">
                        <h2>شرکای ما</h2>
                    </div>
                    <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row ltr">
            <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="carousel_slide5 owl-carousel owl-theme" data-margin="30" data-dots="false" data-loop="true"
                     data-autoplay="true">
                    <div class="items">
                        <a href="#"><img src="{{asset('assets/images/cl_logo1.png')}}" alt="cl_logo1"></a>
                    </div>
                    <div class="items">
                        <a href="#"><img src="{{asset('assets/images/cl_logo2.png')}}" alt="cl_logo2"></a>
                    </div>
                    <div class="items">
                        <a href="#"><img src="{{asset('assets/images/cl_logo3.png')}}" alt="cl_logo3"></a>
                    </div>
                    <div class="items">
                        <a href="#"><img src="{{asset('assets/images/cl_logo4.png')}}" alt="cl_logo4"></a>
                    </div>
                    <div class="items">
                        <a href="#"><img src="{{asset('assets/images/cl_logo5.png')}}" alt="cl_logo5"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

