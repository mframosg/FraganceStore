@extends('layouts.app') @section('content')
<h2 class="text-center mt-5 mb-5 col-12">Available your reviews list</h2>


<div class="card-columns">
  @foreach ($reviews->reverse() as $review)
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">
        <a style="text-decoration: none" href="{{ route('review.show', [$fragance->getId(), $review->getId()]) }}"> {{ $review->getComment() }}</a>
      </h5>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{ $review->getStarts() }}</small>
    </div>
  </div>
  @endforeach
</div>

<div class="text-center mt-5 mb-5">
  <a href="{{ route('review.add.index', $fragance->getId()) }}" class="btn-lg btn-primary p-3"> {{ __('home.add-review')}}</a>
  <a href="{{ route('fragance.info', $fragance->getId()) }}" class="btn-lg btn-primary p-3"> {{ __('home.all')}} </a>
</div>
@endsection
