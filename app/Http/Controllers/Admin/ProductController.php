<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.product.index', [
            'title' => 'Data Produk'
        ]);
    }

    public function data()
    {
        if (request()->ajax()) {
            $data = Product::with('category')->orderBy('name', 'ASC');
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    $btnShow = route('admin.products.show', $model->id);
                    $btnEdit = route('admin.products.edit', $model->id);
                    $action = "<a href='$btnShow' class='btn btn-sm btn-warning mx-1'><i class='fas fa fa-eye'></i> Detail</a><a href='$btnEdit' class='btn btn-sm btn-info btnEdit mx-1'><i class='fas fa fa-edit'></i> Edit</a><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                    return $action;
                })
                ->editColumn('image', function ($model) {
                    return '<img src="' . $model->image() . '" class="img-fluid" style="max-height:50px">';
                })
                ->addColumn('category', function ($model) {
                    return $model->category->name ?? '-';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('admin.pages.product.create', [
            'title' => 'Tambah Data',
            'product_categories' => ProductCategory::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required'],
            'product_category_id' => ['required', 'numeric'],
            'qty' => ['required', 'numeric'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'weight' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $data = request()->only(['name', 'product_category_id', 'qty', 'description', 'price', 'weight']);
        $data['slug'] = \Str::slug($data['name']);
        $data['image'] = request()->file('image')->store('product', 'public');

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Data Produk berhasil ditambahkan');
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);
        return view('admin.pages.product.show', [
            'title' => 'Detail Data',
            'item' => $product
        ]);
    }

    public function edit($id)
    {
        $product = Product::with('category')->find($id);
        return view('admin.pages.product.edit', [
            'title' => 'Edit Data',
            'item' => $product,
            'product_categories' => ProductCategory::orderBy('name')->get()
        ]);
    }

    public function update($id)
    {

        request()->validate([
            'name' => ['required'],
            'product_category_id' => ['required', 'numeric'],
            'qty' => ['required', 'numeric'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'weight' => ['required'],
            'image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);
        $data = request()->only(['name', 'product_category_id', 'qty', 'description', 'price', 'weight']);
        $product = Product::find($id);
        $data['slug'] = \Str::slug($data['name']);

        if(request()->file('image'))
        {
            Storage::disk('public')->delete($product->image);
            $data['image'] = request()->file('image')->store('product', 'public');
        }else{
            $data['image'] = $product->image;
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Data Produk berhasil simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  Product::find($id);
        Storage::disk('public')->delete($item->image);
        $item->delete();
        return response()->json(['status' => 'succcess', 'message' => 'Data Produk berhasil dihapus.']);
    }
}
