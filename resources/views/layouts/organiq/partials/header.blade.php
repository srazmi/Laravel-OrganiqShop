<div class="top-header bg_gray">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-md-7">
              <ul class="contact_detail border_list list_none text-center text-md-left">
                  <li><a href="#"><i class="ti-mobile"></i> <span>0211234567</span></a></li>
                  <li><a href="#"><i class="ti-email"></i> <span>info@gmail.com</span></a></li>
              </ul>
          </div>
          <div class="col-md-5">
              <ul class="header_list border_list list_none header_dropdown text-center text-md-right">
                  <li>
                      <div class="custome_dropdown">
                          <select name="countries" class="custome_select">
                              <option value="en" data-title="English">انگلیسی</option>
                              <option value="fn" data-title="France">فرانسه</option>
                              <option value="us" data-title="United States">عربی</option>
                          </select>
                      </div>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle" href="{{ route('login') }}" data-toggle="dropdown">پروفایل کاربری</a>
                      <div class="dropdown-menu shadow dropdown-menu-right">
                          <ul> 
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __(' ورود به حساب کاربری') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link " href="/profile" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
            
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('خروج از حساب کاربری') }}
                                        </a>
            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            </li>
                              <li><a class="dropdown-item" href="wishlist.html">لیست علاقه مندی</a></li>
                              <li><a class="dropdown-item" href="checkout.html">سبد خرید</a></li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>
<div class="container">
  <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="index.html">
          <img class="logo_light" src="{{asset('assets/images/logo_white.png')}}" alt="آرم">
          <img class="logo_dark" src="{{asset('assets/images/logo_dark.png')}}" alt="آرم">
          <img class="logo_default" src="{{asset('assets/images/logo_dark.png')}}" alt="آرم">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="ناوبری را تغییر دهید"><span
              class="ion-android-menu"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
              <li class="dropdown">
                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">دسته بندی محصولات</a>
                <div class="dropdown-menu">
                    <ul>
                        @foreach($Temp['category'] as $key)
                        {{-- @dd($Temp['category']); --}}
                            <li><a class="dropdown-item nav-link nav_item " href="{{ asset('/').'category/'.$key->name.'/'.$key->id }}"> {{$key->persian_name}} </a>
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach ($Temp['Product'] as $Product)
                                            @if ($key->id == $Product->category_id)
                                                <li><a class="dropdown-item nav-link nav_item"
                                                    href="{{ asset('/').'category/'.$key->name.'/'.$Product->name.'/'.$Product->id }}"> {{$Product->name}} </a></li> 
                                            @endif
                                        @endforeach                                    
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
              <!-- <li class="dropdown dropdown-mega-menu">
                  <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">تخفیف ها و پیشنهادها</a>
                  <div class="dropdown-menu">
                      <ul class="mega-menu d-lg-flex">
                          <li class="mega-menu-col col-lg-3">
                              <ul>
                                  {{-- <li class="dropdown-header">صفحه فروشگاه</li> --}}
                                  <li><a class="dropdown-item nav-link nav_item" href="shop-list-view.html"> خوشمزه های شگفت انگیز</a></li>
                                  <li><a class="dropdown-item nav-link nav_item" href="shop-grid-view.html">  فروش ویژه</a></li>
                                  {{-- <li><a class="dropdown-item nav-link nav_item" href="shop-three-columns.html">فروشگاه سه ستون</a></li>
                                  <li><a class="dropdown-item nav-link nav_item" href="shop-four-columns.html">فروشگاه دو ستون</a></li> --}}
                              </ul>
                          </li>
                          <li class="mega-menu-col col-lg-3">
                              <div class="ads_banner">
                                  <a href="#"><img src="{{asset('assets/images/mega_menu_ads.jpg')}}" alt="mega_menu_ads"></a>
                              </div>
                          </li>
                      </ul>
                  </div>
              </li> -->
              <li class="dropdown">
                <a class="nav-link" href="/store">فروشگاه</a>
              </li>

              <li class="dropdown">
                <a class="nav-link" href="{{Route('weblog')}}">وبلاگ</a>
              </li>
              <li>
                <a class="nav-link" href="{{Route('aboutus')}}">درباره ما</a>
              </li>
              <li>
                <a class="nav-link" href="{{Route('contactus')}}">تماس با ما</a>
              </li>
          </ul>
      </div>
      <ul class="navbar-nav attr-nav align-items-center">
          <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="ion-ios-search-strong"></i></a>
              <div class="search-overlay">
                  <div class="search_wrap">
                      <form method="Get" action="{{Route('search')}}">
                          <div class="rounded_input">
                              <input name="search_item" type="text" placeholder="جستجو" class="form-control" id="search_input">
                          </div>
                          <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                      </form>
                  </div>
              </div>
          </li>
    <!-- <script>
        $(document).on("click",'.search_icon',function(){
        
        
        var SearchItem=$('#search_input').val();
        $.ajax({
        url: '/product/search_products',
        method: 'Post',
        dataType: 'json',
        data: {
            
            SearchItem:SearchItem
        },
        success:function(data)
        {
            
            // {     message="<textarea required="+'"required"'+" placeholder="+'"متن پیام *"'+ "  class="+'"form-control comment"'+" name="+ '"message"'+" rows="+'"4"'+"></textarea>";
                // $('#message').html(message);
                // alert("نظر شما ثبت شد. متشکریم.");
               
                
        }
        
        });

    }); -->
    </script>
          <li class="dropdown cart_wrap " id="basketheader">
          @if($Temp['basket'])  
          <a class="nav-link" id="basketshow" href="/cart" data-toggle="dropdown"><i class="ion-bag"></i><span class="cart_count">{{count($Temp['basket'])}}</span></a>
          @else 
          <a class="nav-link" id="basketshow" href="/cart" data-toggle="dropdown"><i class="ion-bag"></i><span class="cart_count">0</span></a>
            @endif
          <div class="cart_box dropdown-menu dropdown-menu-right">
                  <ul id="cart_list" class="cart_list" >
                        <!-- @$price=0 -->
                        <?php $total=0;?>
                      @if($Temp['basket'])  
                      @foreach($Temp['basket'] as $item)
                         <li>
                            <a  data-id="{{$item->Product()->first()->id}}" class="item_remove delete_basket"><i class="ion-close"></i></a>
                            <a href="#"><img class="item-img" src="{{asset('/').$item->Product()->first()->photoes()->first()->path}}" alt="cart_thumb1">{{$item->Product()->get()->first()->name}} </a>
                            <p><span class="float-right" class="item-num">{{$item->num}} x </span> <span class="float-right">{{$item->Product()->get()->first()->price}} </span></p>
                        </li>
                        <?php $total+=(($item->num) * ($item->Product()->get()->first()->price));?>
                        <!-- @$price+=($item->num)* $item->Product()->get()->first()->price -->
                        @endforeach
                     
                  </ul>
                  <div id="cart_footer" class="cart_footer">
                      <p class="cart_total">جمع کل : <span class="cart_amount"> <span class="price_symbole">{{$total}} تومان</span></span>
                      </p>
                      <p class="cart_buttons"><a href="{{ Route('cart') }}" class="btn btn-default btn-radius view-cart">مشاهده سبد خرید</a>
                          <a href="{{ Route('checkout') }}" class="btn btn-dark btn-radius checkout">پرداخت</a>
                      </p>
                  </div>
                  @endif
                
              </div>
          </li>
      </ul>
  </nav>
</div>