@extends('frontend.layouts.master')
@section('content')
<form action="{{route('frontend.addtocart')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$data['product']->id}}">
    <div class="col-sm-10">
        <div class="cart-quantity" id="qty">

            <input type="number" value="1" name="quantity" readonly="readonly">
        </div>
    </div>
    {{--                                            <div class="form-group">--}}
    {{--                                                <label for="quantity">Quantity</label>--}}
    {{--                                                <select name="quantity" class="form-control col-md-4 select2">--}}
    {{--                                                    @for($i = 1;$i <= $data['product']->stock;$i++)--}}
    {{--                                                        <option value="{{$i}}">{{$i}}</option>--}}
    {{--                                                    @endfor--}}
    {{--                                                </select>--}}
    {{--                                            </div>--}}

    <input type="hidden" name="name" value="{{$data['product']->name}}">
    <input type="hidden" name="amount" value="{{$data['product']->price-$data['product']->discount}}">
    <button type="submit" class="col-sm-7 btn btn-primary">
        <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
    </button>
</form>
@endsection