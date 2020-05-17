@section('weblog')
<section class="pb_20">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
              <div class="text-center">
                  <div class="heading_s1 text-center animation" data-animation="fadeInUp"
                       data-animation-delay="0.02s">
                      <h2>اخبار وبلاگ</h2>
                  </div>
                  <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                      آخرین نوشته‌های مارا دنبال کنید...</p>
                  <div class="small_divider"></div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          @foreach($Posts as $post)
          <div class="col-lg-4 col-md-6">
              <div class="blog_post blog_style1 radius_all_10 animation" data-animation="fadeInUp"
                   data-animation-delay="0.04s">
                  <div class="blog_img">
                      <a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}">
                          <img style="height:200px" src="/<?=$post->photoes()->first()->path;?>" alt="blog_small_img1">
                      </a>
                      <!-- <div class="blog_date style1"><h4>02</h4><span>ممکن است</span></div> -->
                  </div>
                  <div class="blog_content">
                      <h6 class="blog_title"><a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}">{{$post->title}}</a></h6>
                      <ul class="list_none blog_meta">
                          <li><a href="#"><i class="far fa-user"></i>توسط <span class="text_default">مدیر</span></a>
                          </li>
                          <li><a href="#"><i class="far fa-comments"></i>{{count($post->Comments()->get())}} نظر</a></li>
                      </ul>
                      <p>{{$post->getShortContent(40)}} </p>
                      <a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}" class="blog_link">بیشتر بخوانید <i class="ion-ios-arrow-right"></i></a>
                  </div>
              </div>
          </div>
          @endforeach
          <!-- <div class="col-lg-4 col-md-6">
              <div class="blog_post blog_style1 radius_all_10 animation" data-animation="fadeInUp"
                   data-animation-delay="0.05s">
                  <div class="blog_img">
                      <a href="#">
                          <img src="{{asset('assets/images/blog_small_img2.jpg')}}" alt="blog_small_img2">
                      </a>
                      <div class="blog_date style1"><h4>25</h4><span>مار</span></div>
                  </div>
                  <div class="blog_content">
                      <h6 class="blog_title"><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی</a></h6>
                      <ul class="list_none blog_meta">
                          <li><a href="#"><i class="far fa-user"></i>توسط <span class="text_default">مدیر</span></a>
                          </li>
                          <li><a href="#"><i class="far fa-comments"></i>3 نظر</a></li>
                      </ul>
                      <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                      <a href="#" class="blog_link">بیشتر بخوانید <i class="ion-ios-arrow-right"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="blog_post blog_style1 radius_all_10 animation" data-animation="fadeInUp"
                   data-animation-delay="0.06s">
                  <div class="blog_img">
                      <a href="#">
                          <img src="{{asset('assets/images/blog_small_img3.jpg')}}" alt="blog_small_img3">
                      </a>
                      <div class="blog_date style1"><h4>08</h4><span>اوت</span></div>
                  </div>
                  <div class="blog_content">
                      <h6 class="blog_title"><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی</a></h6>
                      <ul class="list_none blog_meta">
                          <li><a href="#"><i class="far fa-user"></i>توسط <span class="text_default">مدیر</span></a>
                          </li>
                          <li><a href="#"><i class="far fa-comments"></i>5 نظر</a></li>
                      </ul>
                      <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                      <a href="#" class="blog_link">بیشتر بخوانید <i class="ion-ios-arrow-right"></i></a>
                  </div>
              </div>
          </div> -->
      </div>
  </div>
</section>
@endsection

