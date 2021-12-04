@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center m-5">
        <form action="/cars" method="POST" class="form w-50 bg-light border text-dark rounded m-2"
            enctype="multipart/form-data">
            @csrf
            <h2 class="m-2">create a car</h2>
            <div class="form-group">
                <label for="image">image :</label>
                <input name="image" class="form-control" type="file" id="image" />
            </div>

            <div class="form-group p-2">
                <label for="brand" class="">Brand :</label>
                <input class="form-control w-75" type="text" name="brand" id="brand" placeholder="brand" />
            </div>
            <div class="form-group p-2">
                <label for="description" class="">description :</label>
                <input class="form-control w-75" type="text" name="description" id="description"
                    placeholder="description" />
            </div>
            <button type="submit" class="btn btn-success ml-2 mb-2">add car</button>
            @if ($errors->any())
                <div id="error" class="bg-danger m-2 rounded p-2">
                    @foreach ($errors->all() as $er)
                        <span class="text-white">{{ $er }}</span>
                    @endforeach
                </div>
            @endif
        </form>

    </div>
@endsection
