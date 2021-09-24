@extends('layouts.app') @section('content')
    <div class="container">
        <form class="bg-white shadow rounded py-3 px-4" action="{{ route('fragance.add') }}" method="POST">
            @csrf
            <div class="container">

                <div class="form-group">

                    <input type="text" class="form-control" name="title" placeholder="Title" required="true">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" name="category" placeholder="Category" required="true">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" name="description" placeholder="Description" required="true">

                </div>

                <div class="form-group">

                    <input type="number" class="form-control" name="price" placeholder="Price"
                        required="true">

                </div>

                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">
                        Agregar
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
