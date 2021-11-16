@extends('layouts.app') @section('content')

{{-- TODO: FOR PARA MOSTRAR LOS ARTICULOS DEL CARRITO --}}

<div class="card-columns">
  @foreach ($items as $item) @foreach ($fragances as $fragance) @if ($item->getFragance_id() == $fragance->getId())
  <div class="card">
    <img src="{{ asset("/img/fragance/$fragance->image") }}" class="card-img-top" alt="not found">

    <div class="card-body">
      <h5 class="card-title">
        {{ $fragance->getTitle() }}
      </h5>
    </div>
    <div class="card-footer text-center bg-white ">$ {{ $item->getsubTotal() }}</div>
    <form action="{{ route('car.edit', [$item->getId(), $fragance->getId()]) }}" method="post" class="row col-12 mt-2">
      @csrf @method('PUT')
      <input type="number" class="btn btn-outline-primary btn-block col-4 mt-2" name="quantity" value="{{$item->getQuantity()}}" min="1" max="99" />
      <button type="submit" class="btn btn-outline-primary btn-block col-8 mt-2">{{ __("home.update-quantity") }}</button>
    </form>
    <form action="{{ route('item.delete', $fragance->getId()) }}" method="POST">
      @csrf @method('DELETE')
      <button type="submit" class="btn btn-outline-primary btn-block col-15 mt-2">
        {{ __("home.delete") }}<i class="fa fas fa-shopping-cart"></i>
      </button>
    </form>
    
  </div>

  @endif @endforeach @endforeach
</div>
<br />
<p class="btn btn-warning btn-block btn-lg">$ {{ $total }}</p>
<form action="{{ route('order.add', $total) }}" method="post">
  @csrf
  <button class="btn btn-info btn-block">{{ __("home.purchase-confirm") }}</button>
  <select class="form-control" name="paymentType" required="true">
    <option value="PSE">{{ __("home.pse") }}</option>
    <option value="Credit Card">{{ __("home.credit-card") }}</option>
    <option value="PayPal">{{ __("home.paypal") }}</option>
  </select>
</form>
<br />
<a  class="btn btn-outline-dark btn-block mt-2" href="{{ route('order.pdf', 1) }}">{{ __("home.pdf") }}</a>
<br />
@endsection
