@extends('layouts.app') @section('content')

    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Portfolio</h2>
            <!-- Portfolio Grid Items-->
            <div class="row">
                <!-- Portfolio Item 1-->

                {{-- Implementar desde el controlador que se manden las imagenes --}}
                @foreach ($wishlists as $wishlist)
                    @foreach ($fragances as $fragance)
                        @if ($wishlist->getFragance_id() == $fragance->getId())
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                                    <a style="text-decoration: none"
                                        href="{{ route('fragance.info', $fragance->getId()) }}">
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
                                
                                    @if (is_null($wishlist))
                                        <a href="{{ route('wishlist.add', $fragance->getId()) }}"
                                            class=" btn btn-outline-success btn-block mt-2 col-12">Add Wish <i
                                                class="fa 	far fas fa-heart"></i></a>
                                    @else
                                        <form action="{{ route('wishlist.delete', $fragance->getId()) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class=" btn btn-outline-success btn-block mt-2 col-25">Delete Wish <i
                                                    class="fa 	far fas fa-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    @if (auth()->user())
        @section('user',
            auth()->user()->getName(),)
        @endif

    @endsection
