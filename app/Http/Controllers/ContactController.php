<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact',[
            'title' => 'Kontak Kami',
            'setting' => Setting::first()
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'subject' => ['required'],
            'text' => ['required']
        ]);

        $data = request()->all();
        Inbox::create($data);
        return redirect()->route('home')->with('success','Pesan anda berhasil dikirim.');
    }
}
