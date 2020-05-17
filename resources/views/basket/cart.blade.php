@extends('layouts.organiq.mastermain')
@section('content')

<!-- START SECTION SHOP DETAIL -->

<section>
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                </ol>
            </nav>
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">محصول</th>
                            <th class="product-price">قیمت</th>
                            <th class="product-quantity">تعداد</th>
                            <th class="product-subtotal">جمع کل</th>
                            <th class="product-remove">حذف</th>
                        </tr>
                        </thead>
                        <tbody id="tbodycontent">
                            <?php $total=0;?>
                        @foreach($Temp['basket'] as $item)
                        <tr>
                        <td class="product-thumbnail"><a href="#"><img src="/<?=$item->Product()->first()->photoes()->first()->path?>" alt="product1"></a></td>
                            <td class="product-name" data-title="Product"><a href="#">{{$item->Product()->get()->first()->name}}</a></td>
                            <td class="product-price" data-title="Price">{{$item->Product()->first()->price}} تومان</td>
                            <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                <input  type="button" value="-" class="edit_cart_minus minus" data-id="{{$item->Product()->first()->id}}">
                                <input  type="text" name="quantity" value="{{$item->num}}" title="Qty" class="qty" id="{{$item->Product()->first()->id}}" readonly size="4">
                                <input  type="button" value="+" class="edit_cart_plus plus" data-id="{{$item->Product()->first()->id}}">
                            </div></td>
                            <?php $price=$item->Product()->first()->price;
                            $num=$item->num;
                             $total+=$price*$num;
                            ?>
                            
                            <td class="product-subtotal" data-title="Total">{{$price * $num}} </td>
                            <td class="product-remove" data-title="Remove"><a class="delete_basket" data-id="{{$item->Product()->first()->id}}"><i class="ti-close"></i></a></td>
                        </tr>
                        @endforeach
                   
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" class="px-0">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                        <!-- <div class="coupon field_form input-group">
                                            <input type="text" value="" class="form-control" placeholder="کد تخفیف ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-default btn-sm" type="submit">کد تخفیف</button>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-lg-8 col-md-6 text-left text-md-right">
                                        <!-- <form method="post" action="/Address"> -->
                                        {{ csrf_field() }}
                                            <!-- <input readonly hidden name="total" value="{{$total}}" > -->
                                            <a href="/Address"   class="btn btn-default btn-sm checkout">ادامه فرایند خرید</a>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="small_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-md-6">
                <div class="heading_s2">
                    <h5>آدرس گیرنده</h5>
                </div>
                <form class="field_form shipping_calculator">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="custom_select">
                            <select name="state" id="SelectState" onChange="CityList(this.value);">
                                <option value="0">لطفا استان را انتخاب نمایید</option>
                                <option value="1">تهران</option>
                                <option value="2">گیلان</option>
                                <option value="3">آذربایجان شرقی</option>
                                <option value="4">خوزستان</option>
                                <option value="5">فارس</option>
                                <option value="6">اصفهان</option>
                                <option value="7">خراسان رضوی</option>
                                <option value="8">قزوین</option>
                                <option value="9">سمنان</option>
                                <option value="10">قم</option>
                                <option value="11">مرکزی</option>
                                <option value="12">زنجان</option>
                                <option value="13">مازندران</option>
                                <option value="14">گلستان</option>
                                <option value="15">اردبیل</option>
                                <option value="16">آذربایجان غربی</option>
                                <option value="17">همدان</option>
                                <option value="18">کردستان</option>
                                <option value="19">کرمانشاه</option>
                                <option value="20">لرستان</option>
                                <option value="21">بوشهر</option>
                                <option value="22">کرمان</option>
                                <option value="23">هرمزگان</option>
                                <option value="24">چهارمحال و بختیاری</option>
                                <option value="25">یزد</option>
                                <option value="26">سیستان و بلوچستان</option>
                                <option value="27">ایلام</option>
                                <option value="28">کهگلویه و بویراحمد</option>
                                <option value="29">خراسان شمالی</option>
                                <option value="30">خراسان جنوبی</option>
                                <option value="31">البرز</option>
                            </select>
                            
                            </div>
                            <div class="custom_select">
                            <select name="city" id="city">
                                <option value="0">لطفا استان را انتخاب نمایید</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input required="required" placeholder="آدرس پستی" class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input required="required" placeholder="تحویل‌گیرنده" class="form-control" name="name" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <input required="required" placeholder="شماره تماس" class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input required="required" placeholder="شماره همراه" class="form-control" name="name" type="text">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button class="btn btn-dark btn-sm" type="submit">ویرایش</button>
                            <a href="#" class="btn btn-default btn-sm">ادامه فرایند خرید</a>
                        </div>
                    </div>
                </form>
            </div> -->
            <div class="col-md-12 " >
                <div class="heading_s2">
                    <h5>فاکتور خرید</h5>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tbody id="baskettablefooter">
                        <tr>
                            <td class="cart_total_label">کل سبد خرید</td>
                            <td class="cart_total_amount">{{ $total}} تومان</td>
                        </tr>
                        <!-- <tr>
                            <td class="cart_total_label">حمل و نقل </td>
                            <td class="cart_total_amount">رایگان</td>
                        </tr> -->
                        <tr>
                            <td class="cart_total_label">جمع کل</td>
                            <td class="cart_total_amount" id="totalprice" data-id="{{$total}}"><strong>{{ $total}} تومان</strong></td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION SHOP DETAIL -->

<!-- <script>
    $(document).on("click",".checkout",function(){
    var total = $("#totalprice").attr('data-id');
    // var num=$('#prd_num').val();
    
    alert(id); 
        $.ajax({
        url: '/add-to-cart',
        method: 'POST',
        dataType: 'json',
        data: {
            total:total,
        },
        success:function(data)
        {
            
            if(data.url)
            {
                window.location=data.url;
            }
            else
            {

                if(data.Message)
                {
                    alert(Message);
                }
                else
                {
                    var basketStr = "";
                    var baskettable="";
                    var basketstrfooter="";
                    var baskettablefooter="";
                    var basketstrheader="";
                    var InputStr="";
                    var $total=0;
                    for (i = 0; i < data['basket'].length; i++)
                    {
                        
                        

                        basketStr+=
                        "<li>"
                        +"<a  data-id="+data['basket'][i]['product'].id+" class="+'"delete_basket item_remove "'+"><i class="+'"ion-close"'+"></i></a>"
                        +"<a href="+'"#"'+"><img class="+'"item-img"'+" src="+'"/'+ data['path'][i]+'"'+ "alt="+'"cart_thumb1"'+">"+data['basket'][i]['product'].name+ "</a>"
                        +"<p><span class="+'"float-right"'+" class="+'"item-num"'+">x "+data['basket'][i].num +" </span> <span class="+'"float-right"'+">"+data['basket'][i]['product'].price+" </span></p>"
                        +"</li>";
                

                        $total+= data['basket'][i].num * data['basket'][i]['product'].price;

                    }
                        basketstrfooter+="<p class="+'"cart_total"'+">جمع کل : <span class="+'"cart_amount"'+"> <span class="+'"price_symbole"'+">"+$total +"تومان</span></span>"
                        +"</p>"
                        +"<p class="+'"cart_buttons"'+"><a href="+'"/cart"' +"class="+'"btn btn-default btn-radius view-cart"'+">مشاهده سبد خرید</a>"
                            +"<a href="+'"/checkout"'+" class="+'"btn btn-dark btn-radius checkout"'+">پرداخت</a>"
                        +"</p>";
                        basketstrheader="<i class="+'"ion-bag"'+"></i><span class="+'"cart_count"'+">"+data['basket'].length+"</span>";

                        $("#cart_list").html(basketStr);
                        $("#tbodycontent").html(baskettable);
                        $("#cart_footer").html(basketstrfooter);
                        $(".baskettablefooter").html(baskettablefooter);
                        $('#basketshow').html(basketstrheader);
                        // $('.quantity').html(InputStr);
                        alert('محصول با موفقیت به سبد خرید اضافه شد');
                }
            }
            
        },

        
});
});
</script> -->


@include('layouts.organiq.partials.newslatter')

@endsection