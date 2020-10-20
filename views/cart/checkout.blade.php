@extends('frontend.layouts.master')

@section('content')
  

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                @include('frontend.includes.flash')
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>Checkout Method
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row ">
                                            <div class="shopping-cart">
                                                <div class="shopping-cart-table ">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <form  method="POST" id="payment-form"  action="{{route('payment.paywithpaypal')}}">
                                                            @csrf
                                                            <thead>
                                                            <tr>
                                                                <th class="cart-romove item">Image</th>
                                                                <th class="cart-description item">Product Name</th>
                                                                <th class="cart-product-name item">Quantity</th>
                                                                <th class="cart-qty item">Price</th>
                                                                <th class="cart-sub-total item">Total</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th colspan="3"></th>
                                                                <th>
                                                                    <div class="cart-grand-total">
                                                                        Grand Total
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="cart-grand-total">
                                                                        <span class="inner-left-md">Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                                <td>
                                                                    <div class="cart-checkout-btn pull-right">
                                                                        <button type="submit" class="btn btn-primary"> Pay with PayPal</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                            @if(count($data['carts']) > 0)
                                                                    @php($i=1)
                                                                @foreach($data['carts'] as $cart)
                                                                        <tr>
                                                                            <input name="item_name_{{$i}}" type="hidden" value="{{$cart->name}}"></p>
                                                                            <input name="item_quantity_{{$i}}" type="hidden" value="{{$cart->qty}}"></p>
                                                                            <input name="item_price_{{$i}}" type="hidden" value="{{$cart->price}}"></p>
                                                                            <td class="cart-image">
                                                                            <a class="entry-thumbnail" href="detail.html">
                                                                                @if(\App\Models\Product::find($cart->id)->product_images()->first())
                                                                                    <img src="{{asset('images/product/' . \App\Models\Product::find($cart->id)->product_images()->first()->name)}}" alt="{{$cart->name}}">
                                                                                @endif
                                                                            </a>
                                                                        </td>
                                                                        <td class="cart-product-name-info">
                                                                            <h4 class='cart-product-description'><a href="detail.html">{{$cart->name}}</a></h4>
                                                                            <div class="row">
                                                                                <div class="cart-product-info">
                                                                                    <span class="product-color">COLOR:<span>Blue</span></span>
                                                                                </div>
                                                                        </td>
                                                                        <td class="cart-product-quantity">{{$cart->qty}}</td>
                                                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price">Rs. {{$cart->price }} </span></td>
                                                                        <td class="cart-product-grand-total"><span class="cart-grand-total-price">Rs. {{$cart->price * $cart->qty}} </span></td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr class="rem1">
                                                                    <td colspan="7" class="invert bg-danger">Empty Cart </td>
                                                                </tr>
                                                            @endif
                                                                <input name="total_num_item" type="hidden" value="{{$i-1}}"></p>
                                                                <input name="amount" type="text" value="{{filter_var(\Gloudemans\Shoppingcart\Facades\Cart::subtotal(), FILTER_SANITIZE_NUMBER_INT)}}"></p>
                                                            </tbody>
                                                            </form>
                                                        </table>
                                                    </div>
                                                </div><!-- /.shopping-cart-table -->

                                            </div><!-- /.shopping-cart -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->
                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                                            <span>2</span>Billing Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-02  -->

                            <!-- checkout-step-03  -->
                            <div class="panel panel-default checkout-step-03">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
                                            <span>3</span>Shipping Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-03  -->

                            <!-- checkout-step-04  -->
                            <div class="panel panel-default checkout-step-04">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
                                            <span>4</span>Shipping Method
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-04  -->

                            <!-- checkout-step-05  -->
                            <div class="panel panel-default checkout-step-05">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
                                            <span>5</span>Payment Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-05  -->

                            <!-- checkout-step-06  -->
                            <div class="panel panel-default checkout-step-06">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
                                            <span>6</span>Order Review
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-06  -->

                        </div><!-- /.checkout-steps -->
                    </div>

                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
