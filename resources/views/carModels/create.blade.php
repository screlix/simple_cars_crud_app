@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center m-5">
        <form action="/cars" method="POST" class="form w-50 bg-light border text-dark rounded m-2">
            @csrf
            <h2 class="m-2">create a model</h2>
            <div class="form-group p-2">
                <label for="brand" class="">car id :</label>
                <input class="form-control w-75" type="text" name="car_id" id="brand" placeholder="car id" />
            </div>
            <div class="form-group p-2">
                <label for="description" class="">model :</label>
                <input class="form-control w-75" type="text" name="model" id="description" placeholder="model" />
            </div>
            <button type="submit" class="btn btn-success ml-2 mb-2">add model</button>
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
