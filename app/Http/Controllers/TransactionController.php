<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id',auth()->id())->with(['details.product'])->latest()->get();
        return view('frontend.pages.transaction.index',[
            'title' => 'Riwayat Pesanan',
            'transactions' => $transactions
        ]);
    }
    public function success($uuid)
    {
        $transaction = Transaction::where('user_id',auth()->id())->with(['payment','user','details'])->where('uuid',$uuid)->firstOrFail();
        return view('frontend.pages.transaction.success',[
            'title' => 'Transaksi berhasil dengan ID ' . $transaction->uuid,
            'transaction' => $transaction
        ]);
    }
}
