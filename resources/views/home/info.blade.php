@extends('layouts.app') @section('content')
    <div class="row">
        <div class="card col-5" style="width: 20rem;">
            <img class="card-img-top" src="{{ asset("/img/fragance/$fragance->image") }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $fragance->getTitle() }}</h5>
                <p class="card-text">
                    {{ $fragance->getDescription() }}
                </p>

                @if (is_null($wishlist))
                    <a href="{{ route('wishlist.add', $fragance->getId()) }}"
                        class="btn btn-outline-success btn-block mt-2 col-12">Add Wish <i class="fa far fas fa-heart"></i></a>
                @else
                    <form action="{{ route('wishlist.delete', $fragance->getId()) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-success btn-block mt-2 col-25">
                            Delete Wish <i class="fa far fas fa-heart"></i>
                        </button>
                    </form>
                @endif

                @if (is_null($item))
                    <form action="{{ route('item.delete', $fragance->getId()) }}" method="post"
                        class="row justify-content-around">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-block col-7 mt-2">{{ __('home.add') }}
                            <i class="fa fas fa-shopping-cart"></i>
                        </button>
                        <input type="number" class="btn btn-outline-primary btn-block col-3" name="quantity" value="1"
                            min="1" max="99" />

                    </form>
                @else
                    <form action="{{ route('item.delete', $fragance->getId()) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="btn btn-outline-primary btn-block col-15 mt-3">{{ __('home.delete') }}<i
                                class="fa fas fa-shopping-cart"></i></button>
                    </form>
                @endif

                <a class="btn btn-primary mt-3 " href="{{ route('home.index') }}">
                    <i class="fas fa-times fa-fw"></i>
                    {{ __('home.Windows') }}
                </a>
            </div>
            <div class="card-footer bg-white">
                <small class="text-muted float-left">{{ $fragance->getCategory() }}</small>
                <small class="text-muted float-right">{{ $fragance->getPrice() }}</small>
            </div>
        </div>
        <div class="col-7 justify-content-center">
          <h2 class="text-center m-5" >Reviews</h2>
          <div class="card-columns mt-4">
              @foreach ($reviews->reverse() as $review)
                  <div class="card">
                      <div class="card-body">
                        {{ $review->getComment() }}
                      </div>
                      <div class="card-footer">
                          <small class="text-muted">{{ $review->getStarts() }}</small>
                      </div>
                  </div>
              @endforeach
          </div>

          <a class="btn btn-primary" data-dismiss="modal" href="{{ route('review.index', $fragance->getId()) }}">
              {{ __('home.Reviews') }}
          </a>
          <div class=" list-group-item bg-info  text-center  text-uppercase m-5">{{ $pokemonArrayData }}</div>
        </div>
      </div>

        @if ($handbagsArrayData == [])
            <div class=" mt-5 list-group-item text-center text-uppercase m-5">Api is not working</div>
        @else
            <div class=" mt-5 row mb-5">
                @foreach ($handbagsArrayData as $handbag)
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item bg-dark text-light text-center">{{ $handbag['name'] }}</li>
                            <li class="list-group-item">{{ $handbag['price'] }}</li>
                            <li class="list-group-item">{{ $handbag['style'] }}</li>
                            <li class="list-group-item">{{ $handbag['color'] }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif
    
    @if (auth()->user()) @section('user',
        auth()->user()->getName(),) @endif

@endsection
