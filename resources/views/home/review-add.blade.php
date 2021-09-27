@extends('layouts.app') @section('content')
    <div class="container">
        <form class="bg-white shadow rounded py-3 px-4" action="{{ route('review.add', $fragance->getId()) }}" method="POST">
            @csrf
            <div class="container">
                <div class="form-group">
                    <input type="text" class="form-control" name="comment" placeholder="Comment" required="true">
                </div>

                <div class="form-group">
                    <select name="starts">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected>5</option>
                    </select>
                </div>

                <br />
                <div class="text-center">
                    <button type="submit" class="btn-lg btn-info">Add comment</button>
                </div>
            </div>
        </form>
    </div>
@endsection
