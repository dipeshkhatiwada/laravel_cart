@extends('frontend.layouts.master')

@section('content')
<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-romove item">Image</th>
                                <th class="cart-description item">Product Name</th>
                                <th class="cart-product-name item">Quantity</th>
                                <th class="cart-qty item">Price</th>
                                <th class="cart-sub-total item">Total</th>
                                <th class="cart-total last-item">Action</th>
                            </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="shopping-cart-btn">
							<span class="">
								<a href="{{route('frontend.index')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<a href="" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
							</span>
                                    </div><!-- /.shopping-cart-btn -->
                                </td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if(count($data['carts']) > 0)
                                @foreach($data['carts'] as $cart)
                            <tr>
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
                                        <div class="col-sm-4">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                    <div class="cart-product-info">
                                        <span class="product-color">COLOR:<span>Blue</span></span>
                                    </div>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quant-input">
                                        <div class="arrows">
                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                        </div>
                                        <input type="text" value="{{$cart->qty}}">
                                    </div>
                                </td>
                                <td class="cart-product-sub-total"><span class="cart-sub-total-price">Rs. {{$cart->price }} </span></td>
                                <td class="cart-product-grand-total"><span class="cart-grand-total-price">Rs. {{$cart->price * $cart->qty}} </span></td>
                                <td class="romove-item"><a href="{{route('frontend.deletecart',$cart->rowId)}}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>

                            </tr>
                                @endforeach
                            @else
                                <tr class="rem1">
                                    <td colspan="7" class="invert bg-danger">Empty Cart </td>
                                </tr>
                            @endif
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->
                <div class="col-md-8 col-sm-12 estimate-ship-tax">
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                </div>
                            </th>
                        </tr>

                        <tr>
                            <td>
                                <div class="cart-checkout-btn pull-right">
                                    @guest('customer')
                                        <a href="{{route('customer.register')}}">
                                        @else
                                        <a href="{{route('frontend.checkout')}}">
                                    @endguest
                                        <button type="submit" class="btn btn-primary checkout-btn"> PROCCED TO CHEKOUT</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </thead><!-- /thead -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
        </div> <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
