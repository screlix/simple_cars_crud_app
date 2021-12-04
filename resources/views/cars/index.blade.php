@extends('layouts.app')

@section('content')
    <div class="">
        <h2 class="m-2 text-light">this is cars page.</h2>
        @if (Auth::user())
            <div>
                <a href="cars/create" class="btn btn-secondary mb-4 ml-2">create a car</a>
                <a href="carModels/create" class="btn btn-secondary mb-4 ml-2">create a car model</a>
            </div>
        @endif
        <section class="">
            @foreach ($cars as $car)
                <div class="p-2 d-flex justify-content-center justify-content-around cars">
                    <div>
                        <span class="font-weight-light text-light">id :</span>
                        <span class="mr-5 text-warning">{{ $car['id'] }}</span>
                    </div>
                    <a href="cars/{{ $car['id'] }}" style="text-decoration: none;color:white">
                        <div>
                            <span class="font-weight-light ">brand :</span>
                            <span class="mr-5 text-warning">{{ $car['brand'] }}</span>
                        </div>
                    </a>
                    <div>
                        <span class="font-weight-light text-light">description :</span>
                        <span class="text-warning">{{ $car['description'] }}</span>
                    </div>
                    @if (Auth::user() && Auth::user()->id == $car['user_id'])
                        <div>
                            <a href="cars/{{ $car->id }}/edit" class="btn btn-primary p-1 pr-3 pl-3 mr-3">Edit</a>
                            <form action="cars/{{ $car->id }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 pr-3 pl-3">Delete</button>
                            </form>
                        </div>
                    @else
                        <div>
                            <button class="btn btn-primary p-1 pr-3 pl-3 mr-3" disabled>Edit</button>
                            <form action="cars/{{ $car->id }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 pr-3 pl-3" disabled>Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
                <hr style="border-color: rgb(133, 133, 133)" />
            @endforeach
        </section>
    </div>
@endsection
