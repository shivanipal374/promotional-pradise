<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class ServiceController extends Controller
{
   public function index(){
        $services = Service::all();
        return view('admin.services.userservice', compact('services'));
    }
    public function status($id)
 {
    $service = Service::findOrFail($id);

    // toggle status (1 -> 0, 0 -> 1)
    $service->status = $service->status == 1 ? 0 : 1;

    $service->save();

    return back()
    ->with('success', 'Status updated successfully');
 }
    public function userindex(){
    
        $services = Service::where('status', 1)->latest()->get();

        return view('serviceindex', compact('services'));
    }
     public function create(){
        return view('admin.services.servicecreate');
    }
    public function store(Request $request) {
    $request->validate([
        'title' => 'required',
        'image' => 'required|image'
    ]);

   $file = $request->file('image');
    $name = time() . '.webp';

    // Image read and encode
    $image = Image::read($file)->toWebp(90);

    // Sahi storage path aur content save karna
    Storage::disk('public')->put('services/' . $name, (string)$image);

    Service::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $name
    ]);

     return redirect('/admin/service')
    ->with('success', 'Service added successfully');
 }

    // EDIT FORM
    public function edit($id){
        $service = Service::find($id);
        return view('admin.services.editservice', compact('service'));
    }

    // UPDATE
    public function update(Request $request, $id){
        $service = Service::find($id);

        if($request->hasFile('image')){
            Storage::delete('public/services/'.$service->image);

                $file = $request->file('image');
            $name = time() . '.webp';

        // Image read and encode
            $image = Image::read($file)->toWebp(90);

        // Sahi storage path aur content save karna
                Storage::disk('public')->put('services/' . $name, (string)$image);


            $service->image = $name;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return redirect('/admin/service')
        ->with('success', 'Service updated successfully');
    }

    // DELETE
    public function destroy($id){
        $service = Service::find($id);

        Storage::delete('public/services/'.$service->image);

        $service->delete();

        return back()
    ->with('success', 'Service deleted successfully');
    }

}
