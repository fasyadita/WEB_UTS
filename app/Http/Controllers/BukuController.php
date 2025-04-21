<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class BukuController extends Controller{

    public function index()
    {
        // Mengambil semua data buku beserta kategori yang terkait
        $buku = BukuModel::with('kategori')->get(); // Mengambil buku beserta relasi kategori
        $kategori = KategoriModel::all();


        // Bisa juga mengatur breadcrumb dan halaman sesuai kebutuhan
        $breadcrumb = (object)[
            'title' => 'Daftar Buku 📖',
            'list' => ['Home', 'Buku']
        ];

        $page = (object)[
            'title' => 'Daftar Buku dengan Kategori'
        ];

        $activeMenu = 'buku'; // Set menu aktif
        
        // Mengirimkan data buku ke view
        return view('buku.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);

    }

    public function list(Request $request)
    {
        $buku = BukuModel::select('id_buku', 'judul', 'penulis', 'penerbit','id_kategori','jumlah_tersedia')
            ->with('kategori');

    // Filter data user berdasarkan level_id
    if ($request->id_kategori) {
    $buku->where('id_kategori', $request->id_kategori);
    }


        return DataTables::of($buku)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($buku) { // menambahkan kolom aksi
                $btn = '<button onclick="modalAction(\'' . url('/buku/' . $buku->id_buku . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/buku/' . $buku->id_buku . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/buku/' . $buku->id_buku . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function show_ajax($id)
{
    $buku = BukuModel::find($id);

    return view('buku.show_ajax', compact('buku'));
}
    public function create_ajax()
    {
        $kategori = KategoriModel::select('id_kategori', 'nama_kategori')->get();

        return view('buku.create_ajax')
            ->with('kategori', $kategori);
    }

    public function store_ajax(Request $request)
    {
        $kategori = KategoriModel::select('id_kategori', 'nama_kategori')->get();

        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'judul' => 'required|string|max:255',
                'penulis' => 'required|string|max:100',
                'penerbit' => 'required|string|max:100',
                'id_kategori' => 'required',
                'jumlah_tersedia' => 'required|integer',
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
                BukuModel::create([
                    'judul' => $request->judul,
                    'penulis' => $request->penulis,
                    'penerbit' => $request->penerbit,
                    'id_kategori' => $request->id_kategori,
                    'jumlah_tersedia' => $request->jumlah_tersedia,
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
        }
    
        return response()->json([
            'status' => false,
            'message' => 'Permintaan tidak valid.'
        ]);

        // dd($request->all(), $request->method());
    }
    

    public function edit_ajax(string $id)
    {
        $buku = BukuModel::find($id);
        $kategori = KategoriModel::select('id_kategori', 'nama_kategori')->get();

        return view('buku.edit_ajax', ['buku' => $buku, 'kategori' => $kategori]);
    }

    public function update_ajax(Request $request, $id)
    {
        // Cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {

            $rules = [
                'judul' => 'required|string|max:255',
                'penulis' => 'required|string|max:100',
                'penerbit' => 'required|string|max:100',
                'id_kategori' => 'required',
                'jumlah_tersedia' => 'required|integer'
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

            $check = BukuModel::find($id);
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
        $buku = BukuModel::find($id);
        BukuModel::with('kategori')->find($id);

        return view('buku.confirm_ajax', ['buku' => $buku]);
    }

    public function delete_ajax(Request $request, String $id){
        //cek apakah request dari ajax
        if ($request->ajax()|| $request->wantsJson()) {
            $buku = BukuModel::find($id);
            if ($buku) {
                $buku->delete();
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


