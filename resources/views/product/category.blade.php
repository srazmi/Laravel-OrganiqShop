@extends('layouts.organiq.mastermain')
@section('content')

<nav aria-label="خرده نان">
    <ol class="breadcrumb justify-content-right">
        <li class="breadcrumb-item"><a href="/">صفحه اصلی</a>
        <i class="fa fa-chevion-right"></i>
        </li>
        <li class="breadcrumb-item active" aria-current="page"> دسته بندی محصولات</li>
    </ol>
</nav>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row align-items-center justify-content-between pb-1 mb-4">
                    <div class="col-auto">
                        <div class="custom_select">
                            <select>
                                <option value="default">مرتب سازی پیش فرض</option>
                                <option value="popularity">مرتب سازی بر اساس محبوبیت</option>
                                <option value="date">مرتب سازی بر اساس جدید بودن</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <span class="align-middle">نمایش {{$products->count()}}  نتیجه</span>
                        <div class="list_grid_icon">
                            <a href="javascript:Void(0);" class="shorting_icon grid_view active"><i class="ion-grid"></i></a>
                            <a href="javascript:Void(0);" class="shorting_icon list_view"><i class="ion-navicon-round"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row shop_container grid_view">     
                    @foreach ($products as $product)

                        <div class="col-lg-4 col-sm-6">
                            <div class="product">
                                <span class="pr_flash bg_green">فروش</span>
                                <div class="product_img">
                                    <a href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}"><img style="height:210px" src="/<?php  echo $product->photoes()->first()->path?>" alt="product_img1"></a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                            <li><a href="#"><i class="ti-shopping-cart"></i></a></li>
                                            <li><a class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="ti-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                    
                                <div  class="product_info">
                                <h6><a   href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}">{{ $product->name }}</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:80%"></div></div>
                                    <span class="price">{{ $product->price }} </span>
                                    <div class="pr_desc">
                                    <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a data-id="{{$product->id}}"  class="addcart" value="{{$product->id}}" ><i class="ti-shopping-cart"></i> افزودن به سبد خرید</a></li>
                                            <li><a data-id="{{$product->id}}" class="ratetoproduct" ><i class="ti-heart"></i></a></li>
                                            <li><a class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="ti-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    @endforeach

                    
                </div>
                
                <div class="row">
                    <div class="col-12 mt-3 mt-lg-4">
                        <ul class="pagination justify-content-center">
                        
                            {{$products->links()}}
                            <!-- <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="ion-ios-arrow-thin-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="ion-ios-arrow-thin-right"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-5 mt-lg-0">
                <div class="sidebar">
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
                    <!-- <div class="widget">
                        <h5 class="widget_title">فیلتر</h5>
                        <div class="filter_price">
                            <div id="price_filter"></div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span>قیمت: <span id="flt_price"></span></span>
                                <input type="hidden" id="price_first">
                                <input type="hidden" id="price_second">
                                <button type="submit" class="btn btn-default btn-sm">فیلتر</button>
                            </div>
                        </div>
                    </div> -->
                    <div class="widget">
                        <h5 class="widget_title">موارد اخیر</h5>
                        <ul class="recent_post border_bottom_dash list_none">
                        @foreach($recentproducts as $product)    
                        <li>
                                <div class="post_img">
                                    <a href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}"><img src="/<?=$product->Photoes()->first()->path; ?>" alt="shop_small1')}}"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="{{ asset('/').'category/'.$product->Category()->first()->name.'/'.$product->name.'/'.$product->id }}">{{$product->name}}</a></h6>
                                    <div class="rating"><div class="product_rate" style="width:100%"></div></div>
                                    <div class="product_price"><span class="price">{{$product->price}} تومان</span></div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <!-- <div class="widget">
                        <h5 class="widget_title">برچسب ها</h5>
                        <div class="tags">
                            @foreach($product->tags()->get() as $tag)
                            <a href="#">{{$tag->name}} </a>
                            @endforeach
                            
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection