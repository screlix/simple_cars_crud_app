<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\carModels;
use App\Models\engines;
use Illuminate\Http\Request;

class carController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except'=>['index','show']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cars = car::all();
        $cars = car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in  storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //we can use also custom validations using command : php artisan make:rules ruleName;
        $request->validate([
            'brand' => 'required|alpha|between:2,20',
            'description' => 'required|alpha_dash|between:10,100',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);
        $imgname = $request->file('image')->getClientOriginalName();
        $image = time() . $imgname;
        $request->file('image')->move(public_path('images'), $image);
        $car = new car();
        $car->brand = $request->input('brand');
        $car->description = $request->input('description');
        $car->image = $image;
        $car->user_id = auth()->user()->id;
        $car->save();

        //redirect :
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = car::where('id', $id)->first();
        $carModelz = carModels::where('car_id', $id)->get();
        $enginz = engines::get();
        // dd($car->engines);
        return view('cars.show', compact('car', 'carModelz', 'enginz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $carv = new car();
        $carv = car::where('id', $id)->first();
        return view('cars.edit', compact('carv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = car::where('id', $id)->first();
        $car->update([
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(car $car)
    {
        //$car = car::where('id', $id)->first();
        $car->delete();
        return redirect('/cars');

    }
}
