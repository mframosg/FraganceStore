@extends('layouts.app') @section('content')
    <h1>Bienvenido usuario {{ auth()->user()->getName() }}</h1>
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($fragances as $fragance)
                    <tr>
                        <td><a style="text-decoration: none" href="{{ route('fragance.show', $fragance->getId()) }}">
                                {{ $fragance->getTitle() }}</a></td>
                        <td><img src="/img/fragance/{{ $fragance->image }}" width="100" height="100"></td>
                        <td>{{ $fragance->getCategory() }}</td>
                        <td>{{ $fragance->getDescription() }}</td>
                        <td>{{ $fragance->getPrice() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <a href="{{ route('fragance.index') }}" class="btn btn-primary">
                Agregar
            </a>
        </div>
    </div>
@endsection
