<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product'])->where('user_id', auth()->id())->get();
        $payments = Payment::orderBy('name', 'ASC')->get();
        return view('frontend.pages.cart', [
            'title' => 'Keranjang Saya',
            'carts' => $carts,
            'payments' => $payments
        ]);
    }

    public function store()
    {
        request()->validate([
            'product_id' => ['required', 'numeric'],
            'qty' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $product = Product::find(request('product_id'));

            //    cek stok produk
            if ($product->qty < request('qty')) {
                return redirect()->back()->with('error', 'Stok Produk Tidak Mencukupi!');
            }


            // cek apakah produk ada di keranjang
            $cekProdukKeranjang = auth()->user()->carts()->where('product_id', request('product_id'))->first();
            if ($cekProdukKeranjang) {

                // tambah qty
                $cekProdukKeranjang->increment('qty',request('qty'));

                //    insert ke database
                $cekProdukKeranjang->update([
                    'price_total' => $product->price * $cekProdukKeranjang->qty
                ]);

            } else {
                //    insert ke database
                auth()->user()->carts()->create([
                    'product_id' => $product->id,
                    'qty' => request('qty'),
                    'price' => $product->price,
                    'price_total' => $product->price * request('qty')
                ]);
            }


            $product->decrement('qty', request('qty'));
            DB::commit();
            return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', 'Ada Kesalah Sistem!');
        }
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
