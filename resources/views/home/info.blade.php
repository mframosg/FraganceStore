@extends('layouts.app') @section('content')
<div class="" id=" portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <!-- Portfolio Modal - Title-->
              <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label">{{ $fragance->getTitle() }}</h2>
              <!-- Icon Divider-->
              <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                  <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
              </div>
              <!-- Portfolio Modal - Image-->
              <div class="card">
                <img class="img-fluid rounded mb-5" src="{{ asset("/img/fragance/$fragance->image") }}" alt="" />
                <!-- Portfolio Modal - Text-->
                <div class="card-body">
                  @if (is_null($wishlist))
                  <a href="{{ route('wishlist.add', $fragance->getId()) }}" class="btn btn-outline-success btn-block mt-2 col-12"
                    >Add Wish <i class="fa far fas fa-heart"></i
                  ></a>
                  @else
                  <form action="{{ route('wishlist.delete', $fragance->getId()) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-success btn-block mt-2 col-25">
                      Delete Wish <i class="fa far fas fa-heart"></i>
                    </button>
                  </form>
                  @endif
                  <br />
                  @if (is_null($item))
                  <form action="{{ route('item.delete', $fragance->getId()) }}" method="post" class="row col-13">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-block col-8 mt-2">Add<i class="fa fas fa-shopping-cart"></i></button>
                    <input type="number" class="btn btn-outline-primary btn-block col-4" name="quantity" value="1" min="1" max="99" />
                  </form>
                  @else
                  <form action="{{ route('item.delete', $fragance->getId()) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary btn-block col-15 mt-2">Delete<i class="fa fas fa-shopping-cart"></i></button>
                  </form>
                  @endif
                </div>
                <br />
                <div class="card">
                  <div class="card-body">
                    <p class="card-text">{{ $fragance->getDescription() }}</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted float-left">{{ $fragance->getCategory() }}</small>
                    <small class="text-muted float-right">{{ $fragance->getPrice() }}</small>
                  </div>
                </div>
              </div>
              <br />
              <a class="btn btn-primary" data-dismiss="modal" href="{{ route('review.index', $fragance->getId()) }}">
                {{ __("home.Reviews") }}
              </a>
              <br />
              <br />
              <h2>Reviews</h2>
              <div class="card-columns">
                @foreach ($reviews->reverse() as $review)
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">
                      {{ $review->getComment() }}
                    </h5>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">{{ $review->getStarts() }}</small>
                  </div>
                </div>
                @endforeach
              </div>
              <br />
              <a class="btn btn-primary" href="{{ route('home.index') }}">
                <i class="fas fa-times fa-fw"></i>
                {{ __("home.Windows") }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if (auth()->user()) @section('user', auth()->user()->getName(),) @endif @endsection
