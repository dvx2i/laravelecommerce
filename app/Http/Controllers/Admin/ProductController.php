<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->orderBy('name', 'ASC')->get();
        $brands = Brand::select('id','name')->orderBy('name', 'ASC')->get();
        return view('admin.product-create', compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required',
            'image'=> 'mimes:jpg,png,jpeg|max:1048'   
        ]);

        $product->name =$request->name;
        $product->slug = Str::slug($request->slug);
        $image = $request->file('image');
        $ext   = $image->extension();
        $file_name = Carbon::now()->timestamp.".".$ext;
        $this->uploadImage($image, $file_name);
        $product->image = $file_name;
        $product->save();

        return redirect()->route('admin.product')->with('status', 'Product created successfully.');
    }

    private function uploadImage($image, $file_name) {
        $path = public_path('uploads/products');
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
    public function edit(Product $product)
    {
        return view('admin.product-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'image'=> 'mimes:jpg,png,jpeg|max:1048'   
        ]);

        $product->name =$request->name;
        $product->slug = Str::slug($request->slug);
        if($request->hasFile('image')){
            if(File::exists(public_path('uploads/products').'/'.$product->image)){
                File::delete(public_path('uploads/products').'/'.$product->image);
            }
            $image = $request->file('image');
            $ext   = $image->extension();
            $file_name = Carbon::now()->timestamp.".".$ext;
            $this->uploadImage($image, $file_name);
            $product->image = $file_name;
        }
        $product->save();

        return redirect()->route('admin.product')->with('status', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product')->with('status', 'Product deleted successfully.');
    }
}
