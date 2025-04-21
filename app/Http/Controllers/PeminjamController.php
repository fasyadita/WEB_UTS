<?php

namespace App\Http\Controllers;


use App\Models\BukuModel;
use App\Models\UserModel;
use App\Models\PinjamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PeminjamController extends Controller
{
    public function index()
    {

        $user = UserModel::all();
        $breadcrumb = (object)[
            'title' => 'Daftar Peminjaman 🤝 ',
            'list' => ['Home', 'peminjam']
        ];

        $page = (object)[
            'title' => 'Daftar Pinjaman yang terdaftar dalam sistem'
        ];

        $activeMenu = 'peminjam'; //set menu yang aktif

        $peminjam = PinjamModel::all(); //set menu yang sedang aktif

        return view('peminjam.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $peminjam = PinjamModel::select('id_pinjam', 'id_buku', 'user_id')
        ->with('buku','user');

        // filter data user brdasarkan level_id
        if ($request->user_id) {
            $peminjam->where('user_id', $request->user_id);
        }

        return DataTables::of($peminjam)
        ->addIndexColumn()
        ->addColumn('nama_buku', function($row) {
        return $row->buku ? $row->buku->judul : '-';
        })
        ->addColumn('username', function($row) {
        return $row->user ? $row->user->username : '-';
       })
       ->addColumn('aksi', function ($peminjam) {
        $btn = '<button onclick="modalAction(\'' . url('/peminjam/' . $peminjam->id_pinjam . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
        $btn .= '<button onclick="modalAction(\'' . url('/peminjam/' . $peminjam->id_pinjam . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
        $btn .= '<button onclick="modalAction(\'' . url('/peminjam/' . $peminjam->id_pinjam. '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
        return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);

    }

    public function show_ajax($id)
    {
        $peminjam = PinjamModel::find($id);

        return view('peminjam.show_ajax', ['peminjam' => $peminjam]);
    
    }

    public function create_ajax()
    {
        $buku = BukuModel::select('id_buku', 'judul')->get();
        $user = UserModel::select('user_id', 'username')->get();

        return view('peminjam.create_ajax')
            ->with('buku', $buku)
            ->with('user', $user);
    }

    public function store_ajax(Request $request)
    {
        $buku = BukuModel::select('id_buku', 'judul')->get();
        $user = UserModel::select('user_id', 'username')->get();

        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'id_buku' => 'required',
                'user_id' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            try {
                PinjamModel::create([
                    'id_buku' => $request->id_buku,
                    'user_id' => $request->user_id,
                ]);
    
                return response()->json([
                    'status' => true,
                    'message' => "Data buku berhasil disimpan"
                    
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Terjadi kesalahan saat menyimpan data',
                    'error' => $e->getMessage()
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => "Data peminjam berhasil disimpan"
            ]);
        }

        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $peminjam = PinjamModel::find($id);
        $buku = BukuModel::select('id_buku', 'judul')->get();
        $user = UserModel::select('user_id', 'username')->get();

        return view('peminjam.edit_ajax', [
            'peminjam' => $peminjam,
            'buku' => $buku,
            'user' => $user
        ]);
    }

    public function update_ajax(Request $request, $id)
    {
        // Cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {

            $rules = [
                'id_buku' => 'required',
                'user_id' => 'required',
            ];

            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // respon json, true: berhasil, false: gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }

            $check = PinjamModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        return redirect('/');
    }

    public function confirm_ajax(string $id){
        $peminjam = PinjamModel::find($id);

        return view('peminjam.confirm_ajax', ['peminjam' => $peminjam]);
    }

    public function delete_ajax(Request $request, $id){
        //cek apakah request dari ajax
        if ($request->ajax()|| $request->wantsJson()) {
            $user = UserModel::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil di hapus'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
            return redirect('/');
        }
    }

}