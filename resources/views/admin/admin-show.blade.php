@extends('layouts.app') @section('content')
    <div class="container">
        <form action="{{ route('fragance.edit', $fragance->getId()) }}" method="POST">
            @csrf @method('PUT')
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
                        <div class="container">

                            <td><input type="text" class="form-control" value="{{ $fragance->getTitle() }}" name="title"
                                    required="true"></td>



                            <td> 
                                <select class="form-control" name="category">
                                    <option selected disabled hidden>
                                        {{ $fragance->getCategory() }}
                                    </option>
                                    <option value="Sweet">
                                        Sweet
                                    </option>
                                    <option value="Refreshing">
                                        Refreshing 
                                    </option>
                                    <option value="Male">
                                        Male 
                                    </option>
                                    <option value="Female">
                                        Female 
                                    </option>
                                </select> 
                            </td>

                            <td><input type="text" class="form-control" value="{{ $fragance->getDescription() }}"
                                    name="description" required="true"></td>

                            <td><input type="number" class="form-control" value="{{ $fragance->getPrice() }}"
                                    name="price" required="true"></td>
                        </div>
                    </tr>

                </tbody>

            </table>
            <button type="submit" class="btn btn-primary btn-block">Volver/Editar</button>
        </form>
        <br />
        <div class="col-12 col.sm-10 col-lg-3 mx-auto">
            <form action="{{ route('fragance.delete', $fragance->getId()) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-block">Borrar</button>
            </form>
            <br>
        </div>
    </div>
@endsection
