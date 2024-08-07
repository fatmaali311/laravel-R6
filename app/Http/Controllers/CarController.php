<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Traits\Common ;

class CarController extends Controller
{
    use Common ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'carTitle' => 'required|string',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'published'=> 'boolean',
        ]);
       
      
        $data['image'] =$this->uploadFile($request->image,'assets/images');
        Car::create($data);
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get data of car to be update
        //select
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'carTitle' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'description' => 'sometimes|required|string|max:1000',
            'image' => 'sometimes|required|mimes:png,jpg,jpeg|max:2048',
            'published'=> 'boolean',
        ]);
        $data['image'] =$this->uploadFile($request->image,'assets/images');
        Car::where('id', $id)->update($data);
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect()->route('cars.index');
    }
    public function showDeleted()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashedCars', compact('cars'));

    }
    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect()->route('cars.index');
    }
    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect()->route('cars.index');
    }

}
