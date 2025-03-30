<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{


    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];
        $activeMenu = 'kategori'; // Set menu yang sedang aktif

        $kategori = KategoriModel::all();

        return view('kategori.index', compact('breadcrumb', 'page', 'kategori', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $kategoris = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        // Filter data kategori berdasarkan kategori_id (jika diperlukan)
        if ($request->kategori_id) {
            $kategoris->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah kategori baru'
        ];
        $kategori = KategoriModel::all(); // ambil data kategori untuk ditampilkan di form (jika diperlukan)
        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data kategori baru
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'kategori_kode' => 'required|string|max:10|unique:m_kategoris,kategori_kode', // Tambahkan unique rule
            'kategori_nama' => 'required|string|max:100',
        ]);

        // Buat kategori baru menggunakan Eloquent Mass Assignment
        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan.');
    }

    public function create_ajax()
    {
        return view('kategori.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|max:10|unique:m_kategoris,kategori_kode', // Tambahkan unique rule
                'kategori_nama' => 'required|string|max:100',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            $kategoriData = $request->all();

            KategoriModel::create($kategoriData);

            return response()->json([
                'status' => true,
                'message' => 'Data kategori berhasil disimpan'
            ]);
        }

        return redirect()->route('kategori.index'); // Redirect jika bukan AJAX request
    }


    public function edit_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);

        return view('kategori.edit_ajax', ['kategori' => $kategori]);
    }

    //  Menyimpan perubahan data kategori ajax
    public function update_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|max:10|unique:m_kategoris,kategori_kode,' . $id . ',kategori_id',
                'kategori_nama' => 'required|max:100',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $check = KategoriModel::find($id);
            if ($check) {
                $data = $request->only(['kategori_kode', 'kategori_nama']);

                $check->update($data);
                return response()->json([
                    'status' => true,
                    'message' => 'Data kategori berhasil diupdate',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data kategori tidak ditemukan',
                ]);
            }
        } else {
            return redirect('/kategori')->with('error', 'Gagal mengupdate data kategori.');
        }
    }

    public function confirm_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return view('kategori.confirm_ajax', ['kategori' => $kategori]);
    }

    // hapus ajax
    public function delete_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $kategori = KategoriModel::find($id);

            if ($kategori) {
                $kategori->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data kategori berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data kategori tidak ditemukan'
                ]);
            }
        }
        return redirect('/kategori')->with('error', 'Gagal menghapus data kategori.'); // Redirect ke halaman kategori jika bukan AJAX
    }

    // public function create()
    // {
    //     return view('kategori.create');
    // }

    // public function store(Request $request)
    // {
    //     KategoriModel::create([
    //         'kategori_kode' => $request->kodeKategori,
    //         'kategori_nama' => $request->namaKategori
    //     ]);
    //     return redirect('/kategori');
    // }

    public function edit($id){
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->update([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diedit');
    }

    public function destroy($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
