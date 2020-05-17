@section('moshtary')
<section class="bg_gray">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
              <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                  <div class="heading_s1 text-center">
                      <h2>مشتریان ما چه می گویند!</h2>
                  </div>
                  <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                     </p>
              </div>
              <div class="small_divider"></div>
          </div>
      </div>
      <div class="row justify-content-center ltr">

          <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
              <div class="testimonial_slider testimonial_style1 carousel_slide3 owl-carousel owl-theme fl"
                   data-margin="30" data-loop="true" data-autoplay="true" data-dots="false">

                   @foreach($Comments as $comment)
                  <div  class="testimonial_box">
                      <div class="testi_desc">
                          <p style="height:70px" >
                          {{$comment->getShortContent(100)}}
                        </p>
                      </div>
                      <div class="testi_meta">
                          <div class="testimonial_img">
                              <img src="/<?=$comment->Users()->first()->photoes()->first()->path; ?>" alt="مشتری">
                          </div>
                          <div class="testi_user">
                              <h5>{{$comment->Users()->first()->name}}</h5>
                              <span>مشتری</span>
                          </div>
                      </div>
                  </div>
                  @endforeach
                  <!-- <div class="testimonial_box">
                      <div class="testi_desc">
                          <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                      </div>
                      <div class="testi_meta">
                          <div class="testimonial_img">
                              <img src="{{asset('assets/images/client_img2.jpg')}}" alt="مشتری">
                          </div>
                          <div class="testi_user">
                              <h5>جان مارک</h5>
                              <span>طراح وب</span>
                          </div>
                      </div>
                  </div>
                  <div class="testimonial_box">
                      <div class="testi_desc">
                          <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                      </div>
                      <div class="testi_meta">
                          <div class="testimonial_img">
                              <img src="{{asset('assets/images/client_img3.jpg')}}" alt="مشتری">
                          </div>
                          <div class="testi_user">
                              <h5>کالوین ویلیام</h5>
                              <span>طراح وب</span>
                          </div>
                      </div>
                  </div> -->
              </div>
          </div>
      </div>
  </div>
  <div class="overlap_shape">
      <div class="ol_shape17">
          <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
              <img data-parallax="{&quot;y&quot;: 20, &quot;smoothness&quot;: 20}"
                   src="{{asset('assets/images/testimonial_bg_img1.jpg')}}" alt="Testonial_bg_img1">
          </div>
      </div>
      <div class="ol_shape18">
          <div class="animation float-left" data-animation="fadeInRight" data-animation-delay="0.5s">
              <img data-parallax="{&quot;y&quot;: 20, &quot;smoothness&quot;: 20}"
                   src="{{asset('assets/images/testimonial_bg_img2.png')}}" alt="Testonial_bg_img2">
          </div>
      </div>
  </div>
</section>
@endsection
