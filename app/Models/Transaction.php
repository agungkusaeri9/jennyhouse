<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function newCode()
    {
        $transaksi_hari_ini = Transaction::whereDate('created_at',Carbon::now()->translatedFormat('d'))->first();
        if($transaksi_hari_ini)
        {
            // format kode 20220301001
            $kode_akhir = \Str::substr($transaksi_hari_ini, 7);
        }
    }
}
