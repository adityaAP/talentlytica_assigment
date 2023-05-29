<?php

namespace App\Http\Controllers;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class NilaiController extends Controller
{
    public function index()
    {
       return view('nilai');
    }

    public function laporan_nilai($id=null)
    {
        $l =  Nilai::where('id',$id)->first();
        $x = $l->nilai_x; // nilai a (rentang 1-33)
        $y = $l->nilai_y; // nilai b (rentang 1-23)
        $z = $l->nilai_z; // nilai b (rentang 1-18)
        $w = $l->nilai_w; // nilai b (rentang 1-13)

        $x_weight = 0.4;
        $y_weight = 0.6; 
        $z_weight = 0.3; 
        $w_weight = 0.7; 

        $x_point = ($x - 1) / (33 - 1) * (5 - 1) + 1;
        $y_point = ($y - 1) / (23 - 1) * (5 - 1) + 1;
        $z_point = ($z - 1) / (18 - 1) * (5 - 1) + 1;
        $w_point = ($w - 1) / (13 - 1) * (5 - 1) + 1;

        $ai = round($x_point * $x_weight + $y_point * $y_weight);
        $ana = round($z_point * $z_weight + $w_point * $w_weight);
        return view('laporan',compact('l','ai','ana'));
    }
    public function update($id=null)
    {
       $n = Nilai::where('id',$id)->first();
       return view('edit',compact('n'));
    }

    public function datatable(Request $request)
    {
        $model = DB::table('nilai');
        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapus" style="margin:5px;" id="'.$data->id.'">HAPUS </a>';
                $html .= '<a href="#" class="btn btn-sm btn-primary lihatlaporan" style="margin:5px;" id="'.$data->id.'" data-toggle="pill" href="#tab-laporan" role="tab" aria-controls="tab-laporan" aria-selected="true">LIHAT LAPORAN </a>';
                $html .= '<a href="#" class="btn btn-sm btn-info edit" data-bs-toggle="modal"
                data-bs-target="#modaledit" style="margin:5px;" id="'.$data->id.'">EDIT </a>';
                return $html;
                })
            ->addIndexColumn()
            ->toJson();
    }
    public function store(Request $req)
    {
        $create = Nilai::create([
            'email'   => $req->email,
            'nama'    => $req->nama,
            'nilai_x' => $req->nilai_x,
            'nilai_y' => $req->nilai_y,
            'nilai_z' => $req->nilai_z,
            'nilai_w' => $req->nilai_w
        ]);
        if($create){
            return response()->json(['status' => 'success','message' => 'Tambah Data Nilai Baru Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Tambah Data Nilai Baru gagal'], 400);
        }
    }

    public function hapus(Request $req)
    {
        $hapus = Nilai::where('id',$req->id)->delete();
        if($hapus){
            return response()->json(['status' => 'success','message' => 'Hapus Data Nilai Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Hapus Data Nilai gagal'], 400);
        }
    }

    public function update_proses(Request $req)
    {
        $update = Nilai::where('id',$req->id)->update([
            'email'   => $req->email,
            'nama'    => $req->nama,
            'nilai_x' => $req->nilai_x,
            'nilai_y' => $req->nilai_y,
            'nilai_z' => $req->nilai_z,
            'nilai_w' => $req->nilai_w
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'Update Data Nilai Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Update Data Nilai gagal'], 400);
        }
    }
    
}
