<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function success($uuid)
    {
        $transaction = Transaction::with(['payment','user','details'])->where('uuid',$uuid)->firstOrFail();
        return view('frontend.pages.transaction.success',[
            'title' => 'Transaksi berhasil dengan ID ' . $transaction->uuid,
            'transaction' => $transaction
        ]);
    }
}