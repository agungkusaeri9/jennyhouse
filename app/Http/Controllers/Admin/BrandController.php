<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.pages.brand.index', [
            'title' => 'Data Brand'
        ]);
    }

    public function data()
    {
        if (request()->ajax()) {
            $data = Brand::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    $action = "<button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-name='$model->name'  ><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                    return $action;
                })
                ->editColumn('image', function ($model) {
                    return '<img src="' . $model->image() . '" class="img-fluid" style="max-height:50px">';
                })
                ->rawColumns(['action', 'image'])
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
            'name' => ['required', Rule::unique('socmeds')->ignore(request('id'))],
            'image' => ['image', 'mimes:jpg,jpeg,png,svg', 'max:2048']
        ]);

        if (request()->file('image')) {
            if (request('id')) {
                $item = Brand::find(request('id'));
                Storage::disk('public')->delete($item->image);
            }
            $image = request()->file('image')->store('socmed', 'public');
        } else {
            if (request('id')) {
                $item = Brand::find(request('id'));
                $image = $item->image;
            } else {
                $image = NULL;
            }
        }

        Brand::updateOrCreate([
            'id'  => request('id')
        ], [
            'name' => request('name'),
            'image' => $image
        ]);

        if (request('id')) {
            $message = 'Data Brand berhasil disimpan.';
        } else {
            $message = 'Data Brand berhasil ditambahakan.';
        }
        return response()->json(['status' => 'succcess', 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  Brand::find($id);
        Storage::disk('public')->delete($item->image);
        $item->delete();
        return response()->json(['status' => 'succcess', 'message' => 'Data Brand berhasil dihapus.']);
    }
}
