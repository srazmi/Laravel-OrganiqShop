@extends('layouts.organiq.mastermain')
@section('content')

<section>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-image">
                            <span class="pr_flash bg_green">فروش</span>
                           
                                    
                            <img id="product_img" src="/<?=$product->photoes()->first()->path; ?>" alt="تولید - محصول" data-zoom-image="/<?=$product->photoes()->first()->path; ?>">
                            
                            <div id="pr_item_gallery" class="product_gallery_item owl-thumbs-slider owl-carousel owl-theme">
                                
                                @foreach($product->photoes()->get() as $photo)
                                <div class="item">
                                    <a href="#" class="active" data-image="/<?=$photo->path; ?>" data-zoom-image="/<?=$photo->path; ?>">
                                        
                                        <img src="/<?=$photo->path; ?>" alt="تولید - محصول">
                                       
                                    </a>
                                </div>
                                @endforeach
                                                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pr_detail">
                            <div class="product-description">
                           
                                    <div class="product-title">
                                        <h4><a href="#">{{ $product->name }}</a></h4>
                                    </div>
                                    <div class="product_price float-left">
                                    <span class="price">{{ $product->price }} تومان</span>
                                    </div>
                                    <div class="rating mt-2 float-right"><div class="product_rate" style="width:80%"></div></div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <p>{{ $product->description }}</p>

                            </div>
                            <hr>
                            <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button"  value="-" class="minus"/>
                                        <input type="text" readonly id="prd_num" name="quantity" value="1" title="Qty" class="qty" size="4"/>
                                        <input type="button" value="+" class="plus"/>
                                    </div>
                                </div>
                                <div class="cart_btn">
                                    <button data-id="{{ $product->id }}" class="btn btn-default btn-radius btn-sm btn-addtocart addcart" type="button">افزودن به سبد خرید</button>
                                    <a class="add_wishlist ratetoproduct" data-id="{{ $product->id }}"  href="#"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <ul class="product-meta list_none">
                                <li>دسته: <a href="#">{{$product->category()->first()->persian_name}}</a> ، <a href="#"></a></li>
                                <li>برچسب ها: @foreach($product->tags()->get() as $tag)<a href="/tags/{{$tag->id}}/products" rel="tag">{{$tag->name}}</a> ،
                                @endforeach
                             </li>
                            </ul>
                            <div class="product_share d-block d-sm-flex align-items-center">
                                <span>به اشتراک گذاشتن با:</span>
                                <ul class="list_none social_icons border_social rounded_social">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style1">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">شرح</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">اطلاعات اضافی</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">نظرات ({{count($product->Comments()->get())}})</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <p>{{ $product->description }}</p>
                                    <p>{{ $product->description }}</p>
                                </div>
                                <!-- <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                    <table class="table table-bordered">
                                        <tbody><tr>
                                            <td>وزن</td>
                                            <td>1 کیلوگرم</td>
                                        </tr>
                                        <tr>
                                            <td>رنگ</td>
                                            <td>قرمز ، سبز</td>
                                        </tr>
                                        <tr>
                                            <td>ابعاد</td>
                                            <td>20 10 × 20 سانتی متر</td>
                                        </tr>
                                        </tbody></table>
                                </div> -->
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div class="comments">
                                        <h5></h5>
                                        <ul class="list_none comment_list mt-4">
                                           
                                           @foreach ($product->Comments()->get() as $comment )
                                        <li>
                                           
                                        
                                                <div class="comment_img">
                                                    <img src="/<?=$comment->Users()->first()->photoes()->first()->path; ?>" alt="client_img1">
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating"><div class="product_rate" style="width:80%"></div></div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">{{$comment->Users()->first()->name}}</span>
                                                        <span class="comment-date">17 تیر 1398</span>
                                                    </p>
                                                    <div class="description">
                                                    <p>{{$comment->comment}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                    <div class="review_form field_form">
                                        <h5>نظر دهید:</h5>
                                        <!-- /// -->
                                        <div class="row mt-3">
                                            <div class="form-group col-12">
                                                <p class="star_rating">
                                                    <span class="star_rating" data-value="{{$product->id}}" data-id="1"><i class="ion-android-star"></i></span>
                                                    <span class="star_rating" data-value="{{$product->id}}" data-id="2"><i class="ion-android-star"></i></span>
                                                    <span class="star_rating" data-value="{{$product->id}}" data-id="3"><i class="ion-android-star"></i></span>
                                                    <span class="star_rating" data-value="{{$product->id}}" data-id="4"><i class="ion-android-star"></i></span>
                                                    <span class="star_rating" data-value="{{$product->id}}" data-id="5"><i class="ion-android-star"></i></span>
                                                </p>
                                            </div>
                                            <div id="message" class="form-group col-12">
                                                <textarea required="required" placeholder="متن پیام *"  class="form-control comment" name="message" rows="4"></textarea>
                                            </div>

                                            <!-- <div class="form-group col-12">
                                                <input type="file"  class="form-control file" name="filetoupload" ></textarea>
                                            </div> -->

                                            <div class="form-group col-12">
                                                <button data-value="/product/post_comment"  data-id="{{$product->id}}" id="submitcomment" class="btn btn-default" name="submit" value="Submit">ارسال نظر</button>
                                            </div>
                                        </div>
                                        <!-- /// -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_s2 m-0">
                            <h3>محصولات مرتبط</h3>
                        </div>
                        <div class="small_divider clearfix"></div>
                        <div class="product_slider carousel_slide3 owl-carousel owl-theme nav_top_right2" data-margin="30" data-nav="true" data-dots="false">
                           
                        @foreach($relatedproducts as $product)
                            <div class="item">
                                <div class="product">
                                    <span class="pr_flash bg_green">فروش</span>
                                    <div class="product_img">
                                        @if($product->Photoes()->first())
                                        <a href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}"><img style="height:200px" src="/<?=$product->Photoes()->first()->path; ?>" alt="product_img1"></a>
                                        @endif
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                <li><a href="#"><i class="ti-shopping-cart"></i></a></li>
                                                <!-- <li><a class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="ti-eye"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6><a href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}">{{$product->name}}</a></h6>
                                        <div class="rating"><div class="product_rate" style="width:80%"></div></div>
                                        <span class="price">{{$product->price}} تومان</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-5 mt-lg-0">
                <div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">دسته بندی ها</h5>

                        @foreach ($Temp['category'] as $category)
                            <?php $i=0;?>
                            @foreach($Temp['Product'] as $product)
                                @if(($product->category_id)==($category->id))
                                    <?php $i++;?>
                                @endif
                            @endforeach
                            <ul class="list_none widget_categories border_bottom_dash">
                                <li><a href="{{ asset('/').'category/'.$category->name.'/'.$category->id }}"><span class="categories_name">{{ $category->persian_name }}</span><span class="categories_num">({{$i}})</span></a></li>
                            </ul>
                        @endforeach
                        
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">موارد اخیر</h5>
                        <ul class="recent_post border_bottom_dash list_none">
                        @foreach($recentproducts as $product)    
                        <li>
                                <div class="post_img">
                                    <a href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}"><img src="/<?=$product->Photoes()->first()->path;?>" alt="shop_small1')}}"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}">{{$product->name}}</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:100%"></div></div>
                                    <div class="product_price"><span class="price">{{$product->price}} تومان</span></div>
                                </div>
                            </li>
                        @endforeach
                            <!-- <li>
                                <div class="post_img">
                                    <a href="#"><img src="{{asset('assets/images/shop_small2.jpg')}}" alt="shop_small2"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="#">انگورهای تازه آلی</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:80%"></div></div>
                                    <div class="product_price"><span class="price">40.00 تومان</span></div>
                                </div>
                            </li>
                            <li>
                                <div class="post_img">
                                    <a href="#"><img src="{{asset('assets/images/shop_small3.jpg')}}" alt="shop_small3"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="#">گوجه فرنگی آلی تازه</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:60%"></div></div>
                                    <div class="product_price"><span class="price">800 تومان</span></div>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                    <div >
                        <h5 class="widget_title">برچسب ها</h5>
                        <div class="tags">
                        @foreach($product->tags()->get() as $tag)<a href="/tags/{{$tag->id}}/products" rel="tag">{{$tag->name}}</a> ،
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 <script type="text/javascript">

    $(document).ready(function(){
        
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $(".ratetoproduct").click(function(){
                var id = $(this).attr('data-id');
                // alert(id);

                $.ajax({
                    url: '/category/rate-to-product',
                    method: 'POST',
                    dataType: 'json',
                    data: {id:id},
                    success:function(data)
                    {
                        alert('امتیاز شما با موفقیت ثبت شد.');
                    }
                    // error: function (XMLHttpRequest,textStatus, errorthrown){
                    //     console.log('AJAX error:' + errorthrown);
                    // }
            });
        });
    });
    </script> 
@include('layouts.organiq.partials.newslatter')
@endsection