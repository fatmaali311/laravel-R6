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
        $class = Classes::get();
        return view('class',compact('class'));
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
        
 
        Classes::create([
           'className'=> $request->className,
           'capacity'=>  $request->capacity,
           'isFulled'=> isset($request->isFulled),
           'price' => $request->price,
          'timeFrom'=> $request->timeFrom,
         'timeTo'=>  $request->timeTo ,
        ]);
        return redirect()->route('class.index');
     }
 
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cl=Classes::findOrFail($id);
        return view('class_details',compact('cl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cl=Classes::findOrFail($id);
        return view('edit_class',compact('cl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data=[
        'className'=> $request->className,
        'capacity'=>  $request->capacity,
        'isFulled'=> isset($request->isFulled),
        'price' => $request->price,
       'timeFrom'=> $request->timeFrom,
      'timeTo'=>  $request->timeTo ,
       ];
     Classes::where('id',$id)->update($data);
     return redirect()->route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classes::where('id', $id)->delete();
        return redirect()->route('class.index');
    }
    public function showDeleted(){
        $class= Classes:: onlyTrashed()->get();
        return view('trashedClass',compact('class'));

    }
}
