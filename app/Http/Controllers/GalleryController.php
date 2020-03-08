<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GalleryController extends Controller
{

    private $table = 'galleries';

    //List Gallery
    public function index(){
      //get gellary cover
      $galleries = DB::table($this->table)->get();

      //render the view
      return view('gallery/index', compact('galleries'));
    }

    //show create form
    public function create(){
//check log in
      if (!Auth::check()) {
          return \Redirect::route('gallery.index');
      }
      return view('gallery/create');
    }

    //store
    public function store(Request $request){
      $name        = $request->input('name');
      $description = $request->input('description');
      $cover_image = $request->file('cover_image');
      $owner_id    = 1;

      //check image is_upload
      if ($cover_image) {
        $cover_image_filename = $cover_image -> getClientOriginalName();
        $cover_image -> move(public_path('img'),$cover_image_filename);
      } else {
        $cover_image_filename = '';
      }

      //insert Gallery
      DB::table($this->table)->insert(
        [
          'name'        => $name,
          'description' => $description,
          'cover_image' => $cover_image_filename,
          'owner_id'    => $owner_id
        ]
      );

      //set Message
      \Session::flash('message','Gallery Created');

      //redirect
      return \Redirect::route('gallery.index');


    }

    //show gallery photo
    public function show($id){
      //get gallery
      $gallery = DB::table($this->table)->where('id',$id)->first();

      //get photo
      $photos = DB::table('photos')->where('gallery_id',$id)->get();

      //render the view
      return view('gallery/show', compact('gallery', 'photos'));
    }
}
