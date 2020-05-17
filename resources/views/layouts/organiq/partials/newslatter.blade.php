@section('newslatter')
<section class="bg_light_green newslatter_wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 text-center">
                <div class="heading_s1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <h2>در خبرنامه ما مشترک شوید</h2>
                </div>
                <p class="m-0 animation" data-animation="fadeInUp" data-animation-delay="0.03s">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                <div class="small_divider"></div>
                <div class="newsletter_form animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                    <form>
                        <div class="rounded_input">
                            <input type="text" class="form-control" required="" placeholder="ایمیل">
                        </div>
                        <button type="submit" title="اشتراک در" class="btn btn-default" name="submit" value="Submit">عضویت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overlap_shape">
        <div class="ol_shape19">
            <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
                <img data-parallax="{&quot;y&quot;: 20, &quot;smoothness&quot;: 20}" src="{{asset('assets/images/shape34.png')}}"
                     alt="شکل34">
            </div>
        </div>
        <div class="ol_shape20">
            <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">
                <img data-parallax="{&quot;y&quot;: 20, &quot;smoothness&quot;: 20}" src="{{asset('assets/images/shape35.png')}}"
                     alt="شکل35">
            </div>
        </div>
    </div>
</section>
@endsection
