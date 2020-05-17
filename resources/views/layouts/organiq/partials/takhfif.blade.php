@section('takhfif')
<section class="bg_light_blue">
  <div class="container">
      <div class="row justify-content-between align-items-center">
          <div class="col-lg-6 col-md-7">
              <div class="deal_content text-center">
                  <div class="heading_s1 text-center animation" data-animation="fadeInUp"
                       data-animation-delay="0.02s">
                      <h2>تخفیف ویژه <br>برای کلیه محصولات غذایی</h2>
                  </div>
                  <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                      لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                  <div class="countdown_time animation" data-animation="fadeInUp" data-animation-delay="0.04s"
                       data-time="2019/06/02 12:30:15"></div>
                  <a href="#" class="btn btn-default btn-radius btn-borderd animation" data-animation="fadeInUp"
                     data-animation-delay="0.04s">اکنون پیشنهاد را مشاهده کنید</a>
              </div>
          </div>
          <div class="col-lg-6 col-md-5">
              <div class="deal_img_wrap bounceimg animation" data-animation="zoomIn" data-animation-delay="0.02s">
                  <img src="{{asset('assets/images/deal_img.png')}}" alt="deal_img">
              </div>
              <div class="circle_bg1">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
          </div>
      </div>
  </div>
  <div class="overlap_shape">
      <div class="ol_shape15">
          <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
              <img data-parallax="{&quot;y&quot;: -30, &quot;smoothness&quot;: 20}" src="{{asset('assets/images/shape32.png')}}"
                   alt="شکل 32">
          </div>
      </div>
      <div class="ol_shape16">
          <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">
              <img data-parallax="{&quot;y&quot;: 30, &quot;smoothness&quot;: 20}" src="{{asset('assets/images/shape33.png')}}"
                   alt="شکل 33">
          </div>
      </div>
  </div>
</section>
@endsection
