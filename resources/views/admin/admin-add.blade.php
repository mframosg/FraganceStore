@extends('layouts.app') @section('content')
<div class="container">
  <form class="bg-white shadow rounded py-3 px-4" action="{{ route('fragance.add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
      <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Title" required="true" />
      </div>

      <div class="form-group">
        <input type="file" class="form-control" name="image" placeholder="Image" required="true" />
      </div>

      <div class="form-group">
        <select class="form-control" name="category" required="true">
          <option value="Sweet">{{ __("home.sweet") }}</option>
          <option value="Female">{{ __("home.female") }}</option>
          <option value="Male">{{ __("home.male") }}</option>
          <option value="Citrict">{{ __("home.citrict") }}</option>
          <option value="Refreshing">{{ __("home.refreshing") }}</option>
        </select>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="description" placeholder="Description" required="true" />
      </div>

      <div class="form-group">
        <input type="number" class="form-control" name="price" placeholder="Price" required="true" />
      </div>

      <br />
      <div class="text-center">
        <button type="submit" class="btn-lg btn-info">{{ __("home.add-product") }}</button>
      </div>
    </div>
  </form>
</div>
@endsection
