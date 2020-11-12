<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Roler;
use Auth;
use App\Category;
use File;


class TigerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Roler::orderby('id', 'DESC')->get();
        return view('flyner.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderby('id', 'DESC')->get();
        return view('flyner.created', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'title'=>'required|max:150|string',
        'description'=>'required|string',
        'image'=>'required|mimes:jpg,png,jpeg|max:5000'
       ]);
      
       if ($request->hasFile('image')) {

        $title=$request->title;
       $description=$request->description;
       $category_id=$request->category;

        $image=$request->file('image');
       $name=time().".".$image->getClientOriginalExtension();
       $path=public_path('/storage/uploads/');
       $image->move($path, $name);

       $post=new Roler;
       $post->title=$title;
       $post->description=$description;
       $post->image=$name;
       $post->user_id=Auth::user()->id;
       $post->category_id=$category_id;

       if($post->save()){
            return redirect('/posts');
       }

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Roler::findOrFail($id);
        return view('flyner.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Roler::findOrFail($id);
        $categories=Category::all();
        return view('flyner.edit', compact('post','categories'));
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
         $request->validate([
        'title'=>'required|max:150|string',
        'description'=>'required|string'  ,
        'category'=>'required',
        'image'=>'required|mimes:jpg,png,jpeg|max:5000'
       ]);

        $post = Roler::findOrFail($id);
 if ($request->hasFile('image')) {

        $image=$request->file('image');
       $name=time().".".$image->getClientOriginalExtension();
       $path=public_path('/storage/uploads/');
       $image->move($path, $name);

       if (isset($post->image)) {
           $oldname=$post->image;
           File::delete($path.''.$oldname);
       }
       $post->image=$name;

      }
         $title=$request->title;
       $description=$request->description;
       $category_id=$request->category;

       $post->title=$title;
       $post->description=$description;
       $post->category_id=$category_id;

       ($post->save());

       return redirect()->back()->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $post = Roler::findOrFail($id);

       $path=public_path('/storage/uploads/');
         if (isset($post->image)) {
           $oldname=$post->image;
           File::delete($path.''.$oldname);
       }

        if (Roler::where('id', $id)->delete()) {

          return redirect()->back()->with('success', 'Record deleted successfully');

      }
        
         return redirect()->back();

    }

}
