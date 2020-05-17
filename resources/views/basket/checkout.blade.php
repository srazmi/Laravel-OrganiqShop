@extends('layouts.organiq.mastermain')
@section('content')

<!-- START SECTION SHOP DETAIL -->
<section>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="small_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="heading_s2">
                    <h5>سفارشات شما</h5>
                </div>
                <div class="table-responsive order_table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>محصول</th>
                            <th>جمع</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $total=0;?>
                            @foreach($factor_items as $item)
                        <tr>
                            <td> {{$item->Product()->get()->first()->name}} <span class="product-qty"> {{$item->num}}x  {{$item->Product()->get()->first()->price}} </span>  </td>
                            <td>{{$item->num* $item->Product()->get()->first()->price}} تومان</td>
                        </tr>
                        <?php $total+=$item->num* $item->Product()->get()->first()->price; ?>
                            @endforeach
                        </tbody>
                        <tfoot>

                        <tr>
                            <th>جمع</th>
                            <td class="product-subtotal">{{$total}} تومان</td>
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
            <div class="col-12">
                <div class="payment_method">
                    <!-- <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                        <label class="form-check-label" for="exampleRadios3">انتقال مستقیم بانکی</label>
                        <p data-method="option3" class="payment-text">بسیاری از متن های قسمت های Lorem Ipsum وجود دارد ، اما اکثر آنها به طریقی دچار تغییراتی شده اند ، با طنز تزریق شده یا کلمات تصادفی که حتی چندان باورپذیر به نظر نمی رسند. </p>
                    </div> -->
                    <form  action="/payment/buy" method="post" >
                        {{ csrf_field() }}
                        <div class="custome-radio">
                            <input  checked class="form-check-input" type="radio" name="payment_option" id="exampleRadios4" value="option4">
                            <label  class="form-check-label" for="exampleRadios4">زرین پال</label>
                        </div>
                        <p data-method="option4" class="payment-text"></p>
                        <button type="submit" id="factorpay" class="btn btn-default"> پرداخت </button>
                    </form>
                    <!-- <div class="custome-radio">
                        <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="option5">
                        <label class="form-check-label" for="exampleRadios5">پی پال</label>
                        <p data-method="option5" class="payment-text">پرداخت از طریق پی پال؛ اگر حساب PayPal ندارید می توانید با کارت اعتباری خود پرداخت کنید.</p>
                    </div> -->
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- END SECTION SHOP DETAIL -->
<script>
// $(document).on("click","#factorpay",function(){

//         var id="<?php //echo session('factor_id'); ?>";
//         // alert(id);
//         $.ajax({
//         url: '/payment/buy',
//         method: 'POST',
//         dataType: 'json',
//         data: {
//             id:id,
//         },
//         success:function(data)
//         {
//             console.log(data);
                      
//         },

        
//     });
// });
</script>
@include('layouts.organiq.partials.newslatter')

@endsection