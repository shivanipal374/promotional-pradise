<?php
namespace App\Http\Controllers;
use App\Models\gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GalleryController extends Controller
{
    // Show all images
    public function index()
    {
        $images = gallery::latest()->get();
        return view('admin.gallery.gallery', compact('images'));
    }

    // Show upload form
    public function create()
    {
        return view('admin.gallery.creategallery');
    }

    // Store image
    public function store(Request $request)
    {     
        $request->validate([
            'image' => 'required|image'
        ]);

        $file = $request->file('image');
        $name = time() . '.webp';
    
        $image = Image::read($file)->toWebp(90);
    
        Storage::disk('public')->put('services/' . $name, (string)$image);

        Gallery::create([
            'image' => $name
        ]);

        return redirect('/admin/gallery')->with('success','Image uploaded');
    }
    public function edit($id){
        $image = Gallery::findOrFail($id);
        return view('admin.gallery.editimage', compact('image'));
    }
    public function update(Request $request, $id){
        $gallery = Gallery::findOrFail($id); 

        if($request->hasFile('image')){

        // old delete
        Storage::disk('public')->delete('gallery/'.$gallery->image);

        $file = $request->file('image');
        $name = time().'.webp';
        $img = Image::read($file)->toWebp(90);
        Storage::disk('public')->put('gallery/'.$name, (string)$img);
        $gallery->image = $name;
     }

     $gallery->save();

      return redirect()->route('admin.gallery')
        ->with('success', 'Image updated successfully');
     }
    // Delete image
    public function destroy($id)
    {
        $img = Gallery::find($id);

        Storage::delete('public/gallery/'.$img->image);

        $img->delete();

        return back()->with('success','Deleted');
    }
    public function indexuser()
    {
              $images = Gallery::latest()->get();

        return view('galleryindex', compact('images'));
    }

}
