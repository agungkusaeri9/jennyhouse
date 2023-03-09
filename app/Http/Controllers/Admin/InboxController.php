<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InboxController extends Controller
{
    public function index()
    {
        return view('admin.pages.inbox.index',[
            'title' => 'Pesan Masuk'
        ]);
    }

    public function data()
    {
        if(request()->ajax())
        {
            $data = Inbox::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($model){
                        $action = "<button class='btn btn-sm btn-danger btnDelete mx-1' data-id='$model->id' data-name='$model->name'><i class='fas fa fa-trash'></i> Hapus</button>";
                        return $action;
                    })
                    ->addColumn('tanggal', function($model){
                        return $model->created_at->translatedFormat('d-m-Y H:i:s');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
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
        Inbox::find($id)->delete();
        return response()->json(['status'=>'succcess','message' => 'Pesan Masuk berhasil dihapus.']);
    }
}
