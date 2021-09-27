@extends('layouts.app') @section('content') @section('user', auth()->user()->getName(),)
<h2 class="text-center mt-5 mb-5 col-12">Available fragrances list</h2>

<div class="card-columns">
  @foreach ($fragances as $fragance)
  @if($fragance->getUser_id() == auth()->user()->getId())
  <div class="card">
    <img src="{{ asset("/img/fragance/$fragance->image") }}" class="card-img-top" alt="not found">

    <div class="card-body">
      <h5 class="card-title">
        <a style="text-decoration: none" href="{{ route('fragance.show', $fragance->getId()) }}"> {{ $fragance->getTitle() }}</a>
      </h5>
      <p class="card-text">{{ $fragance->getDescription() }}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{ $fragance->getCategory() }}</small>
      <small class="text-muted">{{ $fragance->getPrice() }}</small>
    </div>
  </div>
  @endif
  @endforeach
</div>

<div class="text-center mt-5 mb-5">
  <a href="{{ route('fragance.index') }}" class="btn-lg btn-primary p-3"> Add another fragance </a>
</div>
@endsection
