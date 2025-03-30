<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];
        $activeMenu = 'level'; // Set menu yang sedang aktif

        $level = LevelModel::all();

        return view('level.index', compact('breadcrumb', 'page', 'level', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

        // Filter data level berdasarkan level_id (jika diperlukan, meskipun biasanya tidak ada filter ID untuk daftar semua level)
        if ($request->level_id) {
            $levels->where('level_id', $request->level_id);
        }

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn = '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah level baru'
        ];
        $level = LevelModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data level baru
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'level_kode' => 'required|string|max:10|unique:levels,level_kode', // Tambahkan unique rule
            'level_nama' => 'required|string|max:100',
        ]);

        // Buat level baru menggunakan Eloquent Mass Assignment
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/level')->with('success', 'Data level berhasil disimpan.');
    }

    public function create_ajax()
    {
        return view('level.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode' => 'required|string|max:10|unique:levels,level_kode', // Tambahkan unique rule
                'level_nama' => 'required|string|max:100',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            $levelData = $request->all();

            LevelModel::create($levelData);

            return response()->json([
                'status' => true,
                'message' => 'Data level berhasil disimpan'
            ]);
        }

        return redirect()->route('level.index'); // Redirect jika bukan AJAX request (gunakan route() dan beri nama rute)
    }


    public function edit_ajax(string $id)
    {
        $level = LevelModel::find($id);

        return view('level.edit_ajax', ['level' => $level]);
    }

    //  Menyimpan perubahan data level ajax
    public function update_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode' => 'required|max:10|unique:m_levels,level_kode,' . $id . ',level_id',
                'level_nama' => 'required|max:100',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $check = LevelModel::find($id);
            if ($check) {
                $data = $request->only(['level_kode', 'level_nama']);

                $check->update($data);
                return response()->json([
                    'status' => true,
                    'message' => 'Data level berhasil diupdate',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data level tidak ditemukan',
                ]);
            }
        } else {
            return redirect('/level')->with('error', 'Gagal mengupdate data level.');
        }
    }

    public function confirm_ajax(string $id)
    {
        $level = LevelModel::find($id);
        if (!$level) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return view('level.confirm_ajax', ['level' => $level]);
    }

    // hapus ajax
    public function delete_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $level = LevelModel::find($id);

            if ($level) {
                $level->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data level berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data level tidak ditemukan'
                ]);
            }
        }
        return redirect('/level')->with('error', 'Gagal menghapus data level.'); // Redirect ke halaman level jika bukan AJAX
    }
}
