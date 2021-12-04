@extends('layouts.app')

@section('content')
    <div>
        <form action="/cars/{{ $carv->id }}" method="POST" class="form w-50 bg-light border text-dark rounded m-2">
            @csrf
            @method('PUT')
            <h2 class="m-2">edit {{ $carv->brand }}</h2>
            <div class="form-group p-2">
                <label for="brand" class="">Brand :</label>
                <input value="{{ $carv->brand }}" class="form-control w-75" type="text" name="brand" id="brand"
                    placeholder="brand" />
            </div>
            <div class="form-group p-2">
                <label for="description" class="">description :</label>
                <input value="{{ $carv->description }}" class="form-control w-75" type="text" name="description" id="description"
                    placeholder="description" />
            </div>
            <button type="submit" class="btn btn-success ml-2 mb-2">update car</button>
        </form>
    </div>
@endsection
