@extends('layouts.app') @section('content')
@section('user',auth()->user()->getName())
    <h2 class=" text-center col-12">Available fragrances list</h2>
    @foreach ($fragances as $fragance)
        <div class="card-group">
            <div class="card">

                <img src="{{ asset("/img/fragance/$fragance->image") }}" class="d-block col-8" alt="not found">

            <div class="card-body">
                <h5 class="card-title"><a style="text-decoration: none"
                        href="{{ route('fragance.show', $fragance->getId()) }}">
                        {{ $fragance->getTitle() }}</a></h5>
                <p class="card-text">{{ $fragance->getDescription() }}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{ $fragance->getCategory() }}</small>
                <small class="text-muted">{{ $fragance->getPrice() }}</small>
            </div>
        </div>
        </div>

    @endforeach

    <div class="text-center">
        <a href="{{ route('fragance.index') }}" class="btn btn-primary">
            Agregar
        </a>
    </div>
@endsection
