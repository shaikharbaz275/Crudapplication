<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Utilities\FileUpload;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, FileUpload $fileupload)
    {
        $data = $request->all();
        $data['images'] = $fileupload->upload($request->images);
        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product, FileUpload $fileUpload)
    {
        $data = $request->all();
        if (isset($data['images']) and !is_null($data['images'])) {
            $data['images'] = $fileUpload->upload($data['images']);
            $data['images'] = array_merge($data['images'], $product->images);
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

    /**
     * this function return trashed product data
     *
     * @return void
     */
    public function trashed()
    {
        $products = Product::onlyTrashed()->get();

        return view('admin.product.trashed', compact('products'));
    }

    /**
     * this function restor data
     *
     * @return void
     */
    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        return back();
    }

    /**
     * this function image delete
     */

    public function imageDelete(Request $request, Product $product)
    {
        $images = $product['images'];
        $index = array_search($request['image'], $images);
        $removeimage = array_splice($images, $index, 1);
        $product['images'] = $images;
        unlink(public_path("/upload/$removeimage[0]"));
        $product->save();
        return back();
    }

    /**
     * this function product  active amd deactive status
     */

    public function toggle(Product $product)
    {
        $product->toggle();
        return back();
    }

    /**
     * this function delete permanently data  form trashed
     *
     * @param Product $id
     * @return void
     */
    public function permanentlyDelete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->forceDelete();
        return back();
    }
}
