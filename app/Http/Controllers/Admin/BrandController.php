<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('name', 'ASC')->paginate(5);
        return view('admin.brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image'=> 'mimes:jpg,png,jpeg|max:1048'   
        ]);

        $brand->name =$request->name;
        $brand->slug = Str::slug($request->slug);
        $image = $request->file('image');
        $ext   = $image->extension();
        $file_name = Carbon::now()->timestamp.".".$ext;
        $this->uploadImage($image, $file_name);
        $brand->image = $file_name;
        $brand->save();

        return redirect()->route('admin.brand')->with('status', 'Brand created successfully.');
    }

    private function uploadImage($image, $file_name) {
        $path = public_path('uploads/brands');
        $img = Image::read($image->path())->save($path."/".$file_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand-edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image'=> 'mimes:jpg,png,jpeg|max:1048'   
        ]);

        $brand->name =$request->name;
        $brand->slug = Str::slug($request->slug);
        if($request->hasFile('image')){
            if(File::exists(public_path('uploads/brands').'/'.$brand->image)){
                File::delete(public_path('uploads/brands').'/'.$brand->image);
            }
            $image = $request->file('image');
            $ext   = $image->extension();
            $file_name = Carbon::now()->timestamp.".".$ext;
            $this->uploadImage($image, $file_name);
            $brand->image = $file_name;
        }
        $brand->save();

        return redirect()->route('admin.brand')->with('status', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brand')->with('status', 'Brand deleted successfully.');
    }
}
