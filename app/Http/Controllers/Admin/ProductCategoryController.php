<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
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
                    ->rawColumns(['action'])
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
            'name' => ['required',Rule::unique('post_categories')->ignore(request('id'))]
        ]);

        ProductCategory::updateOrCreate([
            'id'  => request('id')
        ],[
            'name' => request('name'),
            'slug' => \Str::slug(request('name'))
        ]);

        if(request('id'))
        {
            $message = 'Kategori Produk berhasil disimpan.';
        }else{
            $message = 'Kategori Produk berhasil ditambahakan.';
        }
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
        ProductCategory::find($id)->delete();
        return response()->json(['status'=>'succcess','message' => 'Data Kategori Produk berhasil dihapus.']);
    }
}
