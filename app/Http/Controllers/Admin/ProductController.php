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
            'price' => 'required'  
        ]);

        $product->name =$request->name;
        $product->slug = $request->slug;
        $product->description_1 = $request->description_1;
        $product->description_2 = $request->description_2;
        $product->price = str_replace(",", "", $request->price);
        $product->sale = $request->sale;
        $product->sale_price = str_replace(",", "", $request->sale_price);
        $product->stocks = !empty($request->stocks) ? $request->stocks : 0;
        $product->product_status = $request->product_status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        // image for thumbnail
        $image = $request->file('image');
        $ext   = $image->extension();
        $file_name = Carbon::now()->timestamp.".".$ext;
        $this->uploadImage($image, $file_name);
        $product->image = $file_name;

        // image for detail
        $images = "";
        if($request->hasFile('images')){
            $imagesArr = array();
            $n = 1;
            $timestamp = Carbon::now()->timestamp;
            $imagesInp = $request->file('images');
            foreach($imagesInp as $imagesInp){
                $ext   = $imagesInp->extension();
                $file_name = $timestamp."-".$n.".".$ext;
                $this->uploadImage($imagesInp, $file_name);
                array_push($imagesArr, $file_name);
                $n++;
            }

            $images = implode(",", $imagesArr);
        }
        $product->images = $images;

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
        $categories = Category::select('id','name')->orderBy('name', 'ASC')->get();
        $brands = Brand::select('id','name')->orderBy('name', 'ASC')->get();
        return view('admin.product-edit', compact('product','categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required'  
        ]);

        $product->name =$request->name;
        $product->slug = $request->slug;
        $product->description_1 = $request->description_1;
        $product->description_2 = $request->description_2;
        $product->price = str_replace(",", "", $request->price);
        $product->sale = $request->sale;
        $product->sale_price = str_replace(",", "", $request->sale_price);
        $product->stocks = !empty($request->stocks) ? $request->stocks : 0;
        $product->product_status = $request->product_status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

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
        
        // image for detail
        $images = "";
        if($request->hasFile('images')){
            $imagesOld = explode(",", $product->images );
            foreach ($imagesOld as $key => $value) {
                if(File::exists(public_path('uploads/products').'/'.$value)){
                    File::delete(public_path('uploads/products').'/'.$value);
                }
            }
            $imagesArr = array();
            $n = 1;
            $timestamp = Carbon::now()->timestamp;
            $imagesInp = $request->file('images');
            foreach($imagesInp as $imagesInp){
                $ext   = $imagesInp->extension();
                $file_name = $timestamp."-".$n.".".$ext;
                $this->uploadImage($imagesInp, $file_name);
                array_push($imagesArr, $file_name);
                $n++;
            }

            $images = implode(",", $imagesArr);
            $product->images = $images;
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
