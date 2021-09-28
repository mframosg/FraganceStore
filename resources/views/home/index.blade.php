@extends('layouts.app') @section('content')
    <div class="container">
        <form action="{{ route('search') }}" method="get">
            <div class="row">
                <div class="col-xl-8 col-xl-offset-2">
                    <div class="input-group ">
                        <div class="input-group-prepend">

                            <select class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" name="category">
                                <option value="All" class="dropdown-item">All</option>
                                <div role="separator" class="dropdown-divider"></div>
                                <option value="Male" class="dropdown-item">Male</option>
                                <option value="Female" class="dropdown-item">Female</option>
                                <option value="Sweet" class="dropdown-item">Sweet</option>
                                <option value="Citric" class="dropdown-item">Citric</option>
                                <option value="Refreshing" class="dropdown-item">Refreshing</option>
                            </select>
                        </div>
                    </div>
                    <input type="text" class="form-control rounded-0" name="title" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-rigth" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">

        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Fragances</h2>
            <!-- Portfolio Grid Items-->
            <div class="row">
                <!-- Portfolio Item 1-->
                @foreach ($fragances as $fragance)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                            <a style="text-decoration: none" href="{{ route('fragance.info', $fragance->getId()) }}">
                                <div
                                    class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                                    <div class="portfolio-item-caption-content text-center text-white">
                                        <i class="fas fa-plus fa-3x"></i>
                                    </div>
                                </div>
                            </a>
                            <img class="img-fluid" src="{{ asset("/img/fragance/$fragance->image") }}"
                                alt="not founded" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @if (auth()->user())
        @section('user',
            auth()->user()->getName(),)
        @endif
    @endsection
