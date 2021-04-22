<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Image;
use Auth;

class ProfileController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get DB Data
        $profiles = Profile::all();

        // Return Form
        return view('admin.profiles.index')->withProfiles($profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get DB Data
        $img = Profile::orderBy('created_at', 'desc')->take(1)->first();

        // Return Form
        return view('admin.profiles.create')->withImg($img);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $image = new Profile;

        if ($request->file('image')) {
          $imagePath = $request->file('image');
          $imageName = $imagePath->getClientOriginalName();

          $path = $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        // $image->name = $imageName;
        $image->image = $imageName;
        $image->image_path = '/storage/'.$path;
        $image->user_id = Auth::user()->id;
        $image->username = Auth::user()->email;
        $image->save();

        return back()->with('success', 'Image uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
