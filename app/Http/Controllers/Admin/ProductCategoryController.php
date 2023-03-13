<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.product-category.index',[
            'title' => 'Data Kategori Produk'
        ]);
    }

    public function data()
    {
        if(request()->ajax())
        {
            $data = ProductCategory::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($model){
                        $action = "<button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                        return $action;
                    })
                    ->addColumn('image', function($model){
                        return '<img src='.$model->image().' class="img-fluid" style="max-height:70px"></img>';
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
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
            'name' => ['required',Rule::unique('product_categories','name')->ignore(request('id'))],
            'image' => ['required','image','mimes:jpg,jpeg,png','max:2048'],
        ]);

        if(request('id'))
        {
            $item = ProductCategory::find(request('id'));
            if(request()->file('image'))
            {
               $item->image ?  Storage::disk('public')->delete($item->image) : '';
                $image = request()->file('image')->store('product-category','public');
            }else{
                $image = $item->image;
            }
            $message = 'Kategori Produk berhasil disimpan.';
        }else{
            $image = request()->file('image')->store('product-category','public');
            $message = 'Kategori Produk berhasil ditambahakan.';
        }

        ProductCategory::updateOrCreate([
            'id'  => request('id')
        ],[
            'name' => request('name'),
            'image' => $image,
            'slug' => \Str::slug(request('name'))
        ]);
        return response()->json(['status'=>'succcess','message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductCategory::find($id);
        $item->image ?  Storage::disk('public')->delete($item->image) : '';
        $item->delete();
        return response()->json(['status'=>'succcess','message' => 'Data Kategori Produk berhasil dihapus.']);
    }
}
