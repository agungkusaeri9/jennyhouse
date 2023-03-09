<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.pages.payment.index',[
            'title' => 'Metode Pembayaran'
        ]);
    }

    public function data()
    {
        if(request()->ajax())
        {
            $data = Payment::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($model){
                        $action = "<button class='btn btn-sm btn-info btnEdit mx-1' data-id='$model->id' data-name='$model->name'  data-number='$model->number' data-desc='$model->desc'><i class='fas fa fa-edit'></i> Edit</button><button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                        return $action;
                    })
                    ->editColumn('icon', function($model){
                        return '<img src="'.$model->icon().'" class="img-fluid" style="max-height:50px">';
                    })
                    ->rawColumns(['action','icon'])
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
            'name' => ['required',Rule::unique('payments')->ignore(request('id'))],
            'icon' => ['image','mimes:jpg,jpeg,png','max:2048'],
            'number' => ['required'],
            'desc' => ['required']
        ]);

        if(request()->file('icon'))
        {
            if(request('id'))
            {
                $item = Payment::find(request('id'));
                $item->icon ? Storage::disk('public')->delete($item->icon) : '';
            }
            $icon = request()->file('icon')->store('payment','public');
        }else{
            if(request('id'))
            {
                $item = Payment::find(request('id'));
                $icon = $item->icon;
            }else{
                $icon = NULL;
            }
        }

        Payment::updateOrCreate([
            'id'  => request('id')
        ],[
            'name' => request('name'),
            'icon' => $icon,
            'number' => request('number'),
            'desc' => request('desc')
        ]);

        if(request('id'))
        {
            $message = 'Metode Pembayaran berhasil disimpan.';
        }else{
            $message = 'Metode Pembayaran berhasil ditambahakan.';
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
        $item =  Payment::find($id);
        $item->icon ? Storage::disk('public')->delete($item->icon) : '';
        $item->delete();
        return response()->json(['status'=>'succcess','message' => 'Metode Pembayaran berhasil dihapus.']);
    }
}
