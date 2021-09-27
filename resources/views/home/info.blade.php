@extends('layouts.app') @section('content')
    <div class="" id="portfolioModal1" tabindex="-1" role="dialog"
        aria-labelledby="portfolioModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"
                                    id="portfolioModal1Label">{{ $fragance->getTitle() }}</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="{{ asset("/img/fragance/$fragance->image") }}"
                                    alt="" />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-5">
                                    {{ $fragance->getCategory() }}
                                </p>
                                <p class="mb-5">
                                    {{ $fragance->getDescription() }}
                                </p>
                                <p class="mb-5">
                                    {{ $fragance->getPrice() }}
                                </p>
                                @if(Auth::check())
                                  <form action="" method="post">
                                    <textarea name="comment" id="" cols="30" rows="10"></textarea>
                                    <select name="stars">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5"selected>5</option>
                                    </select>
                                    <button type="submit">Add review</button>
                                  </form>
                                @endif
                                {{-- @foreach($reviews as $review)
                                  <p>$review->getComment()</p> 
                                @endforeach --}}
                                
                                <button class="btn btn-primary" data-dismiss="modal">
                                  <a href="{{ route("home.index") }}">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                  </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
