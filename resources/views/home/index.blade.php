@extends('layouts.app') @section('content')
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
  <div class="container">
    <!-- Portfolio Section Heading-->
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Portfolio</h2>
    <!-- Portfolio Grid Items-->
    <div class="row">
      <!-- Portfolio Item 1-->
      @foreach ($fragances as $fragance)
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
          <a style="text-decoration: none" href="{{ route('fragance.info', $fragance->getId()) }}">
          <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
          </div>
        </a>
          <img class="img-fluid" src="{{ asset("/img/fragance/$fragance->image") }}" alt="not founded" />
        </div>
        <div class="row">
          <a href="{{ route("home.wish") }}" class=" btn btn-outline-primary btn-block mt-2 col-4">Wish list <i class="fa 	far fas fa-heart"></i></a>
          <form action="" method="post" class="row col-8" >
            <a href="{{ route("car.buy") }}" class=" btn btn-outline-primary btn-block col-8 mt-2">Add<i class="fa 	fas fa-shopping-cart"></i></a>
            <input type="number" class="btn btn-outline-primary btn-block col-4 " value="1" min="1" max="99" />
          </form> 
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@if(auth()->user())
  @section('user', auth()->user()->getName(),)
@endif
@endsection
