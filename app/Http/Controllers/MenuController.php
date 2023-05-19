<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        //with pagination
        $menu = Menu::latest()->paginate(5);
    
        return view('menu.index',compact('menu'))
  ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
     
        $input = $request->all();
      //  dd($input);
      if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $profileimage = date('YmdHis') . "." .$image->getClientOriginalExtension();
        $image->move($destinationPath, $profileimage);
        $input['image'] = "$profileimage";
    }
        Menu::create($input);
        return redirect()->route('menu.index');
       

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $menu = Menu::findorFail($id);
        return view('menu.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findorFail($id);
        
        return view('menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $menu = new Menu();
        $menu = $menu->find($id);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $imagepath = 'image/'.$menu->image;
        if(File::exists($imagepath)){
            File::delete($imagepath);
        }
          
        $menu->update($input);
   // $menu->save();
        return redirect()->route('menu.index')
        ->with('success','Product updated successfully');

  
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $menu = Menu::findorFail($id);

        $imagepath = 'image/'.$menu->image;
        if(File::exists($imagepath)){
            File::delete($imagepath);
        }
        

        $menu->delete();
       
        return redirect()->route('menu.index');
    }
}
