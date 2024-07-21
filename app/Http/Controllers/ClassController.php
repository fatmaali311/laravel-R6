<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $className='B1';
        $capacity='21';
        $isFulled=true;
        $price ='1000';
        $timeFrom='10';
        $timeTo='2';
 
        Classes::create([
           'className'=> $className,
           'capacity'=>  $capacity,
           'isFulled'=>  $isFulled,
           'price' => $price,
          'timeFrom'=>  $timeFrom,
         'timeTo'=>  $timeTo ,
        ]);
        return "Data added successfully";
     }
 
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
