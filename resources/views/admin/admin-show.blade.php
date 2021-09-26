@extends('layouts.app') @section('content')
<div class="container">
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $fragance->getTitle() }}</td>
        <td>{{ $fragance->getCategory() }}</td>
        <td>{{ $fragance->getDescription() }}</td>
        <td>{{ $fragance->getPrice() }}</td>
      </tr>
    </tbody>
  </table>
  <br />
  <div class="col-12 col.sm-10 col-lg-3 mx-auto">
    <form action="{{ route('fragance.delete', $fragance->getid()) }}" method="POST">
      @csrf @method('DELETE')
      <button type="submit" class="btn btn-danger">Borrar</button>
      <a href="{{ route('admin.home') }}" class="btn btn-primary float-right"> Volver </a>
    </form>
  </div>
  @endsection
</div>
