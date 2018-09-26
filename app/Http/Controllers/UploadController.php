<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
  // public function uploadForm()
  // {
  //   // return view('upload_form');
  //   return view('imagesUpload');
  // }
  public function imagesUpload()
   {
       return view('imagesUpload');
   }
  // public function uploadSubmit(UploadRequest $request)
  // {
  //   $product = Product::create($request->all());
  //       foreach ($request->photos as $photo) {
  //           $filename = $photo->store('photos');
  //           ProductsPhoto::create([
  //               'product_id' => $product->id,
  //               'filename' => $filename
  //           ]);
  //       }
  //       return 'Upload successful!';
  // }
  public function imagesUploadPost(Request $request)

    {
        request()->validate([
            'uploadFile' => 'required',
        ]);

        foreach ($request->file('uploadFile') as $key => $value) {
            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('images'), $imageName);
        }
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }
}
