@extends('layouts.app') @section('content')
<div class="container">
  <form action="{{ route('fragance.edit', $fragance->getId()) }}" method="POST">
    @csrf @method('PUT')
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">{{ __("home.title") }}</th>

          <th scope="col">{{ __("home.category") }}</th>
          <th scope="col">{{ __("home.description") }}</th>
          <th scope="col">{{ __("home.price") }}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <div class="container">
            <td><input type="text" class="form-control" value="{{ $fragance->getTitle() }}" name="title" required="true" /></td>

            <td>
              <select class="form-control" name="category">
                <option selected disabled hidden>
                  {{ $fragance->getCategory() }}
                </option>
                <option value="Sweet">
                  {{ __("home.sweet") }}
                </option>
                <option value="Refreshing">
                  {{ __("home.refreshing") }}
                </option>
                <option value="Male">
                  {{ __("home.male") }}
                </option>
                <option value="Female">
                  {{ __("home.female") }}
                </option>
              </select>
            </td>

            <td><input type="text" class="form-control" value="{{ $fragance->getDescription() }}" name="description" required="true" /></td>

            <td><input type="number" class="form-control" value="{{ $fragance->getPrice() }}" name="price" required="true" /></td>
          </div>
        </tr>
      </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-block">{{ __("home.back") }}</button>
  </form>
  <br />
  <div class="col-12 col.sm-10 col-lg-3 mx-auto">
    <form action="{{ route('fragance.delete', $fragance->getId()) }}" method="POST">
      @csrf @method('DELETE')
      <button type="submit" class="btn btn-danger btn-block">{{ __("home.delete") }}</button>
    </form>
    <br />
  </div>
</div>
@endsection
