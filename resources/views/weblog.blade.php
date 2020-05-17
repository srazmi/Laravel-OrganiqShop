@extends('layouts.organiq.mastermain')
@section('content')

<nav aria-label="خرده نان">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="/">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{Route('weblog')}}">وبلاگ</a></li>
    </ol>
</nav>
<!-- START SECTION BLOG -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                
                @foreach($posts as $post)
                    <div class="col-12">
                        <div class="blog_post">
                            <div class="blog_img">
                                <a href="#">
                                    <img src="/<?=$post->photoes()->first()->path; ?>">
                                </a>
                            </div>
                           
                            <div class="blog_content">
                                <h4 class="blog_title"><a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}">{{$post->title}}</a></h4>
                                <ul class="list_none blog_meta">
                                    <li><a href="#"><i class="far fa-user"></i>توسط <span class="text_default">مدیر</span></a></li>
                                    <li><a href="#"><i class="far fa-calendar"></i>{{$post->created_at}}</a></li>
                                    <li><a href="#"><i class="far fa-comments"></i>{{count($post->Comments()->get())}} نظر</a></li>
                                </ul>
                                <p>{{$post->getShortContent(100)}} </p>
                                <a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}" class="blog_link">بیشتر بخوانید <i class="ion-ios-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
                <div class="row">
                    <div class="col-12 mt-3 mt-lg-4">
                        <ul class="pagination justify-content-center">
                            {{$posts->links()}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-5 mt-lg-0">
                <div class="sidebar">
                    <div class="widget">
                        <div class="search_widget">
                        <form method="get" action="/post/search_posts">
                                <input name="search_item" required="" placeholder="جستجو..." type="text">
                                <button type="submit" class="btn-submit" name="submit" value="Submit">
                                    <span class="ti-search"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="widget">
                        <h5 class="widget_title">درمورد من</h5>
                        <div class="about_widget">
                            <a href="#"><img src="assets/images/about_author.jpg" alt="About_author"></a>
                            <h5 class="about_author">کالوین ویلیام</h5>
                            <span class="author_email">info@yourmail.com</span>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            </p>
                        </div>
                    </div> -->
                    <div class="widget">
                        <h5 class="widget_title">دسته بندی ها</h5>
                        @if($Temp['category'])
                            @foreach ($Temp['category'] as $category)
                            <?php $i=0;?>
                            @foreach($Temp['Product'] as $product)
                                @if(($product->category_id)==($category->id))
                                    <?php $i++;?>
                                @endif
                            @endforeach
                                <ul class="list_none widget_categories border_bottom_dash">
                                    <li><a href="{{ asset('/').'category/'.$category->name.'/'.$category->id }}"><span class="categories_name"> {{$category->persian_name}} </span><span class="categories_num">({{$i}})</span></a></li>
                                </ul>
                            @endforeach
                            @endif
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">پستهای اخیر</h5>
                        <ul class="recent_post border_bottom_dash list_none">
                            @foreach($recentposts as $post)
                            <li>
                                <div class="post_content">
                                    <div class="post_img">
                                        <a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}"><img src="/<?=$post->photoes()->first()->path; ?>" alt="letest_post1"></a>
                                    </div>
                                    <div class="post_info">
                                        <h6><a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}">{{$post->getShortContent(40)}}</a></h6>
                                        <p class="small m-0">{{$post->created_at}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <!-- <li>
                                <div class="post_content">
                                    <div class="post_img">
                                        <a href="#"><img src="assets/images/letest_post2.jpg" alt="letest_post2"></a>
                                    </div>
                                    <div class="post_info">
                                        <h6><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                        <p class="small m-0">25 تیر 1398</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post_content">
                                    <div class="post_img">
                                        <a href="#"><img src="assets/images/letest_post3.jpg" alt="letest_post3"></a>
                                    </div>
                                    <div class="post_info">
                                        <h6><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h6>
                                        <p class="small m-0">25 تیر 1398</p>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                    <!-- <div class="widget">
                        <h5 class="widget_title">برچسب ها</h5>
                        <div class="tags">
                            <a href="#">طراحی </a>
                            <a href="#">عمومی </a><a href="#">jQuery </a>
                            <a href="#">برند سازی </a>
                            <a href="#">وبلاگ </a><a href="#">مدرن به </a>
                            <a href="#">نقل از </a><a href="#">تبلیغات</a>
                        </div>
                    </div> -->
                    <!-- <div class="widget">
                        <h5 class="widget_title">غذاهای اینستگرام</h5>
                        <ul class="list_none instafeed">
                            <li><a href="#"><img src="assets/images/insta_img1.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="assets/images/insta_img2.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="assets/images/insta_img3.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="assets/images/insta_img4.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="assets/images/insta_img5.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="assets/images/insta_img6.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="assets/images/insta_img7.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="assets/images/insta_img8.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                        </ul>
                    </div> -->
                    <div class="widget">
                        <h5 class="widget_title">بیا دنبالم</h5>
                        <ul class="list_none social_icons radius_social">
                            <li><a href="#" class="sc_facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" class="sc_pinterest"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->


@include('layouts.organiq.partials.newslatter')

@endsection