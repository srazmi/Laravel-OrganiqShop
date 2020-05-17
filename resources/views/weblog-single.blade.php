
@extends('layouts.organiq.mastermain')
@section('content')



<!-- START SECTION BLOG -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="single_post">
                    <div class="blog_img">
                        <div class="carousel_slide1 owl-carousel owl-theme" data-autoplay="true" data-autoheight="true" data-loop="true" data-nav="true" data-dots="false" data-autoplay-timeout="3000">
                            @foreach($post->photoes()->get() as $photo)
                            <a href="#">
                                <img src="/<?=$photo->path; ?>" alt="blog_img4">
                            </a>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="single_post_content">
                        <div class="blog_text">
                            <h2 class="blog_title">{{$post->title}}</h2>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="far fa-user"></i>توسط <span class="text_default">مدیر</span></a></li>
                                <li><a href="#"><i class="far fa-comments"></i>{{count($post->Comments()->get())}} نظر</a></li>
                            </ul>
                            @if($post->content_one)
                            <p>{{$post->content_one}}</p>
                            @endif
                            @if($post->content_blockqotoe)
                            <blockquote>
                                <p>{{$post->content_blockqotoe}}</p>
                            </blockquote>
                            @endif
                            @if($post->content_two)
                            <p>{{$post->content_two}}</p>
                            @endif
                            <div class="border-top border-bottom blog_post_footer">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-8 mb-3 mb-md-0">
                                    <div class="tags">
                                        
                                        @foreach($post->tags()->get() as $tag)
                                        <a href="/tag/{{$tag->id}}/posts">{{$tag->name}} </a>
                                        @endforeach
                                    </div>
                                    </div>
                                    <!-- <div class="col-md-4 text-md-right">
                                        <div class="share">
                                            <ul class="list_none social_icons">
                                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post_navigation">
                        <!-- <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <i class="ion-ios-arrow-thin-left mr-2"></i>
                                        <div>
                                            <span>پست قبلی</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#">
                                    <div class="d-flex align-items-center flex-row-reverse text-right">
                                        <i class="ion-ios-arrow-thin-right ml-2"></i>
                                        <div>
                                            <span>پست بعدی</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="author_block">
                        <div class="author_img">
                            <img src="assets/images/user1.jpg" alt="کاربر 1">
                        </div>
                        <div class="author_meta">
                            <div class="author_intro">
                                <a href="#">مبارک والتر</a>
                            </div>
                            <div class="author_desc">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="related_post">
                        <div class="posts-title">
                            <h5>پست های مرتبط</h5>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="carousel_slide3 owl-carousel owl-theme" data-dots="false" data-margin="30">
                                    @if(count($relatedposts)>0)
                                    @foreach($relatedposts as $post)
                                    <div class="item">
                                        <div class="blog_post">
                                            <div class="blog_img">
                                                <a href="#">
                                                    <img style="height:150px" src="/<?=$post->photoes()->first()->path; ?>" alt="blog_small_img2">
                                                </a>
                                            </div>
                                            <div class="blog_content">
                                                <h6 class="blog_title"><a href="#">{{$post->title}}</a></h6>
                                                <ul class="list_none blog_meta">
                                                    <li><a href="#"><i class="far fa-calendar"></i>{{$post->created_at}}</a></li>
                                                    <li><a href="#"><i class="far fa-comments"></i>{{count($post->Comments()->get())}} نظر</a></li>
                                                </ul>
                                                <p>{{$post->getShortContent(100)}} </p>
                                                <a href="{{ asset('/').'weblog/'.$post->title.'/'.$post->id }}" class="blog_link"><i class="ion-ios-arrow-right"></i> بیشتر بخوانید  </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-area">
                        <div class="posts-title">
                            <h5>({{count($post->Comments()->get())}}) نظرات</h5>
                        </div>
                        <ul class="list_none comment_list">

                        @foreach ($post->Comments()->get() as $comment )
                            <li class="comment_info">
                                <div class="d-flex">
                                    <div class="user_img">
                                        <img class="radius_all_5" src="/<?=$comment->Users()->first()->photoes()->first()->path; ?>" alt="client_img1">
                                    </div>

                                    <div class="comment_content">
                                        <div class="d-flex">
                                            <div class="meta_data">
                                                <h6><a href="#">{{$comment->Users()->first()->name}}</a></h6>
                                                <div class="comment-time">{{$comment->created_at}}</div>
                                            </div>
                                        </div>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>

                            </li>
                            @endforeach
 
                        </ul>
                        <div class="posts-title">
                            <h5>نظر خود را بنویسید</h5>
                        </div>
                        <form class="field_form form_style2" name="enq" method="post">
                            <div class="row">
                                
                                <div id="message" class="form-group col-12">
                                    <textarea required="required" placeholder="متن پیام *"  class="form-control comment" name="message" rows="4"></textarea>
                                </div>

                                

                                <div class="form-group col-12">
                                    <button data-value="/post/post_comment"  data-id="{{$post->id}}" id="submitcomment" class="btn btn-default" name="submit" value="Submit">ارسال نظر</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-5 mt-lg-0">
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
                            <p> در تحقیقات هویج توسعه مقطع کارشناسی است. در حال حاضر شناسه اندوه ELIT dapibus تعداد بارداری DUI.</p>
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

                        </ul>
                        @endforeach
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">برچسب ها</h5>
                        <div class="tags">
                        @foreach($post->tags()->get() as $tag)
                            <a href="/tag/{{$tag->id}}/posts">{{$tag->name}} </a>
                        @endforeach
                        </div>
                    </div>
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
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">بیا دنبالم</h5>
                        <ul class="list_none social_icons radius_social">
                            <li><a href="#" class="sc_facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" class="sc_pinterest"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->


@endsection