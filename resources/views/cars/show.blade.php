@extends('layouts.app')
@section('content')
    <div class="showSec w-100 d-flex flex-wrap align-items-center flex-column justify-content-center p-5">
        <h1 class="m-auto text-info">info about {{ $car['brand'] }} :</h1>
        <div>
            <div class="m-3 text-center">
                <span>brand : </span>
                <h2>{{ $car['brand'] }}</h2>
            </div>
            <div class="m-3 text-center">
                <span>about : </span>
                <h2>{{ $car['description'] }}</h2>
            </div>
            <div class="m-3 text-center">
                <img src="{{ asset('images/' . $car['image']) }}" alt="image" width="250px" />
            </div>
            <div class="m-3 text-center ">
                <table class="table text-light">
                    <tr>
                        <th>Models &#8595;</th>
                        <th>Engines &#8595; </th>
                    </tr>
                    @foreach ($carModelz as $m)
                        <tr>
                            <td>{{ $m['model'] }}</td>
                            <td>
                                @foreach ($enginz as $en)
                                    @php
                                        if ($en['model_id'] == $m['id']) {
                                            echo $en['engine'];
                                        }
                                    @endphp
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    <tr>

                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
