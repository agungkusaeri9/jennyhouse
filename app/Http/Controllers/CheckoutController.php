<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $transaksi_hari_ini = Transaction::whereNotNull('code')->whereDate('created_at',Carbon::now()->translatedFormat('Y-m-d'))->latest()->first();
        $transaksi_terakhir = Transaction::whereNotNull('code')->latest()->first();
        if($transaksi_hari_ini)
        {
            // format kode 20220301001
            $kode_akhir = \Str::substr($transaksi_hari_ini->code, 8);
            $kode_awalan = \Str::substr($transaksi_hari_ini->code,0,8);
            $kode_baru = $kode_awalan . str_pad($kode_akhir + 1,3,'000',STR_PAD_LEFT);

        }else{
            // jika tidak ada transaksi
            $kode_baru = Carbon::now()->translatedFormat('Ymd') . '001';
        }



        request()->validate([
            'name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
            'payment_id' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $carts = Cart::where('user_id', auth()->id())->get();
            if($carts->count() < 1)
            {
                return redirect()->back()->with('error', 'Ada Kesalahan Sistem!');
            }



            $transaction = auth()->user()->transactions()->create([
                'uuid' => \Str::uuid(),
                'code' => $kode_baru,
                'name' => request('name'),
                'email' => request('email'),
                'phone_number' => request('phone_number'),
                'address' => request('address'),
                'transaction_total' => $carts->sum('price_total'),
                'transaction_status' => 'PENDING',
                'payment_id' => request('payment_id')
            ]);

            foreach ($carts as $cart) {
                $transaction->details()->create([
                    'product_id' => $cart->product_id,
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'price_total' => $cart->price_total
                ]);
                $cart->product->decrement('qty', $cart->qty);
            }

            // hapus data di keranjang
            Cart::where('user_id', auth()->id())->delete();
            DB::commit();
            sleep(2);
            return redirect()->route('transactions.success', $transaction->uuid)->with('success', 'Checkout berhasil!');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Ada Kesalahan Sistem!');
        }
    }
}
