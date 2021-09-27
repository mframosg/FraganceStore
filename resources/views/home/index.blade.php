@extends('layouts.app') @section('content')
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
  <div class="container">
    <!-- Portfolio Section Heading-->
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Portfolio</h2>
    <!-- Icon Divider-->
    <div class="divider-custom">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
      <div class="divider-custom-line"></div>
    </div>
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
      </div>
      @endforeach
    </div>
  </div>
</section>
@if(auth()->user())
  @section('user', auth()->user()->getName(),)
@endif
@endsection
