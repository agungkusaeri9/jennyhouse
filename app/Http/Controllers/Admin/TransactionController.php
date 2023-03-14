<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
                        $action = "<button class='btn btn-sm btn-warning btnShow mx-1' data-id='$model->id' data-uuid='$model->uuid'><i class='fas fa fa-eye'></i> Detail</button><button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-status='$model->transaction_status'><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                        return $action;
                    })
                    ->addColumn('created', function($model){
                        return $model->created_at->translatedFormat('d-m-Y H:i:s');
                    })
                    ->editColumn('transaction_status', function($model){
                        if ($model->transaction_status === 'PENDING'){
                            $status = '<span class="btn btn-sm btn-secondary">PENDING</span>';
                        }elseif($model->transaction_status === 'PROCESS'){
                            $status = '<span class="btn btn-sm btn-warning text-white">PROCESS</span>';
                        }elseif($model->transaction_status === 'SUCCESS'){
                            $status = '<span class="btn btn-sm btn-success">SUCCESS</span>';
                        }else{
                            $status = '<span class="btn btn-sm btn-danger">FAILED</span>';
                        }

                        return $status;
                    })
                    ->editColumn('transaction_total', function($model){
                        return 'Rp. ' . number_format($model->transaction_total);
                    })
                    ->rawColumns(['action','transaction_status'])
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
           'transaction_status' => ['required','in:PENDING,PROCESS,SUCCESS,FAILED']
        ]);

        Transaction::updateOrCreate([
            'id'  => request('id')
        ],[
            'transaction_status' => request('transaction_status')
        ]);

        if(request('id'))
        {
            $message = 'Transaksi berhasil disimpan.';
        }else{
            $message = 'Transaksi berhasil ditambahakan.';
        }
        return response()->json(['status'=>'succcess','message' => $message]);
    }

    public function show($id)
    {
        if(request()->ajax()){
            $transaction = Transaction::with('details.product','payment','user')->where('id',$id)->first();
            if($transaction->payment){
                $transaction['payment_detail'] = $transaction->payment->name . ' - ' . $transaction->payment->number . ' ( ' . $transaction->payment->desc . ' )';
            }else{
                $transaction['payment_detail'] = '-';
            }

            // status
            if ($transaction->transaction_status === 'PENDING'){
                $transaction['status'] = '<span class="btn btn-sm btn-secondary">PENDING</span>';
            }elseif($transaction->transaction_status === 'PROCESS'){
                $transaction['status'] = '<span class="btn btn-sm btn-warning text-white">PROCESS</span>';
            }elseif($transaction->transaction_status === 'SUCCESS'){
                $transaction['status'] = '<span class="btn btn-sm btn-success">SUCCESS</span>';
            }else{
                $transaction['status'] = '<span class="btn btn-sm btn-danger">FAILED</span>';
            }

            // transaction total
            $transaction['transaction_total'] = 'Rp. ' . number_format($transaction->transaction_total);

            // tanggal
            $transaction['created'] = $transaction->created_at->translatedFormat('d-m-Y H:i:s');
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
        return response()->json(['status'=>'succcess','message' => 'Data Transaksi berhasil dihapus.']);
    }
}
