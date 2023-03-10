<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.pages.transaction.index',[
            'title' => 'Data Transaksi'
        ]);
    }

    public function data()
    {
        if(request()->ajax())
        {
            $data = Transaction::with(['details.product'])->latest();
            return DataTables::eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($model){
                        $action = "<button class='btn btn-sm btn-warning btnShow mx-1' data-id='$model->id' data-uuid='$model->uuid'><i class='fas fa fa-eye'></i> Detail</button><button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                        return $action;
                    })
                    ->addColumn('created', function($model){
                        return $model->created_at->translatedFormat('d-m-Y H:i:s');
                    })
                    ->editColumn('transaction_total', function($model){
                        return 'Rp. ' . number_format($model->transaction_total);
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

        Transaction::updateOrCreate([
            'id'  => request('id')
        ],[
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        if(request('id'))
        {
            $message = 'Kategori berhasil disimpan.';
        }else{
            $message = 'Kategori berhasil ditambahakan.';
        }
        return response()->json(['status'=>'succcess','message' => $message]);
    }

    public function show($id)
    {
        if(request()->ajax()){
            $transaction = Transaction::with('details.product')->where('id',$id)->first();
            return response()->json($transaction);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::find($id)->delete();
        return response()->json(['status'=>'succcess','message' => 'Data kategori berhasil dihapus.']);
    }
}
