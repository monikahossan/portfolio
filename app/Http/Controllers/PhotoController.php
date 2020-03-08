<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;


class PhotoController extends Controller
{
  private $table = 'photos';
    //show create form
  public function create($gallery_id){
    //check log in
          if (!Auth::check()) {
              return \Redirect::route('gallery.index');
          }
    return view('photo/create', compact('gallery_id'));
  }

  //store photo
  public function store(Request $request){
    $gallery_id  = $request->input('gallery_id');
    $title       = $request->input('title');
    $description = $request->input('description');
    $location = $request->input('location');
    $image = $request->file('image');
    $owner_id    = 1;

    //check image is_upload
    if ($image) {
      $image_filename = $image -> getClientOriginalName();
      $image -> move(public_path('img'),$image_filename);
    } else {
      $image_filename = '';
    }

    //insert Gallery
    DB::table($this->table)->insert(
      [
        'title'        => $title,
        'description' => $description,
        'location' => $location,
        'gallery_id'=>$gallery_id,
        'image' => $image_filename,
        'owner_id'    => $owner_id
      ]
    );

    //set Message
    \Session::flash('message','Portfolio Added');

    //redirect
    return \Redirect::route('gallery.show', array('id' =>$gallery_id));
  }

  //show  photo details
  public function details($id){
    //get photo
    $photo = DB::table($this->table)->where('id',$id)->first();

    //render the view
    return view('photo/details', compact('photo'));
  }
  //delete
  public function destroy($id,$gallery_id){
    $photo = DB::table($this->table)->where('id',$id)->delete();

    //set Message
    \Session::flash('message','Portfolio Deleted Successfully');

    //redirect
    return \Redirect::route('gallery.show', array('id' =>$gallery_id));
  }
  //edit
  public function edit($id){
    //get photo
    $photo = DB::table($this->table)->where('id',$id)->first();

    //render the view
    return view('photo/edit', compact('photo'));
  }
  //udatedata
  public function udatedata(Request $request){
    $id          = $request->input('id');
    $gallery_id  = $request->input('gallery_id');
    $title       = $request->input('title');
    $description = $request->input('description');
    $location    = $request->input('location');
    $image       = $request->file('image');
    $owner_id    = 1;

    //check image is_upload
    if ($image) {
      $image_filename = $image -> getClientOriginalName();
      $image -> move(public_path('img'),$image_filename);
      DB::table($this->table)->where('id',$id)->update(
        [
          'title'        => $title,
          'description' => $description,
          'location' => $location,
          'gallery_id'=>$gallery_id,
          'image' => $image_filename,
          'owner_id'    => $owner_id
        ]
      );
    } else {
      DB::table($this->table)->where('id',$id)->update(
        [
          'title'        => $title,
          'description' => $description,
          'location' => $location,
          'gallery_id'=>$gallery_id,
          'owner_id'    => $owner_id
        ]
      );
    }


    //set Message
    \Session::flash('message','Portfolio Updated');

    //redirect
    return \Redirect::route('gallery.show', array('id' =>$gallery_id));

  }
}
