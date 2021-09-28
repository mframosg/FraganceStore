@extends('layouts.app') @section('content')
    <div class="container">
        <form action="{{ route('review.edit', [$fragance_id, $review->getId()]) }}" method="POST">
            @csrf @method('PUT')
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Comment</th>
                        <th scope="col">Starts</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <div class="container">

                            <td> <input type="text" class="form-control" name="comment" value="{{ $review->getComment() }}"
                                    required="true">
                            </td>

                            <td><select name="starts">
                                    <option value="1" {{ old('starts') == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('starts') == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('starts') == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('starts') == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('starts') == 5 ? 'selected' : '' }}>5</option>
                                </select></td>
                        </div>
                    </tr>

                </tbody>

            </table>
            <button type="submit" class="btn btn-primary btn-block">{{ __('home.back')}}</button>
        </form>
        <br />
        <div class="col-12 col.sm-10 col-lg-3 mx-auto">
            <form action="{{ route('review.delete', [$fragance_id, $review->getId()]) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-block">Borrar</button>
            </form>
            <br>
        </div>
    </div>
@endsection
