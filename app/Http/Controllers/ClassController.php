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
        $data=$request->validate([
        'className'=>'required|string',
        'capacity'=> 'required|numeric|min:10|max:50',
        'price' =>'required|numeric|min:0',
        'timeFrom'=>'required|date_format:H:i',
         'timeTo'=>'required|date_format:H:i',

        ]);
        $data['isFulled']=isset($request->isFulled);
        Classes::create($data);
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
        $data=$request->validate([
            'className'=>'sometimes|required|string',
            'capacity'=> 'sometimes|required|numeric|min:10|max:50',
            'price' =>'sometimes|required|numeric|min:0',
            'timeFrom'=>'sometimes|required|date_format:H:i',
            'timeTo'=>'sometimes|required|date_format:H:i|after:timeFrom',
    
            ]);
            //dd($data);
         $data['isFulled']=isset($request->isFulled);
         
         
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
    public function restore(string $id){
        Classes::where('id',$id)->restore();
        return redirect()->route('class.index');
    }
    public function forceDelete(string $id){
        Classes::where('id',$id)->forceDelete();
        return redirect()->route('class.index');
    }
}
