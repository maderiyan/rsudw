<?php
// Ini controller untuk mengelola data perbaikan
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePerbaikanRequest;
use App\Http\Requests\UpdatePerbaikanRequest;
use App\Models\Perbaikan;
use App\Models\Eviden;
use Illuminate\Support\Facades\Auth;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $d_meta = [
        'title' => 'Perbaikan'
      ];
      $user = Auth::user();
      $data = Perbaikan::with('eviden')->where('user_id', $user->id)->get();
      if ($user->role == 'admin') {
        $data = Perbaikan::with('eviden')->get();
      }
      
      return view('perbaikan.index', ['listperbaikan' => $data, 'd_meta' => $d_meta, 'd_user' => $user]);
    }

    // pegawai - get form pengajuan
    public function ajukan()
    {
      $d_meta = [
        'title' => 'Pegawai - Ajukan Perbaikan'
      ];
      $user = Auth::user();
      $data = Perbaikan::with('eviden')->where('user_id', $user->id)->get();
      if ($user->role == 'admin') {
        $data = Perbaikan::with('eviden')->get();
      }
      
      return view('perbaikan.ajukan', ['listperbaikan' => $data, 'd_meta' => $d_meta, 'd_user' => $user]);
    }

    // pegawai - get data history pengajuan
    public function history()
    {
      $d_meta = [
        'title' => 'Pegawai - History Perbaikan'
      ];
      $user = Auth::user();
      $data = Perbaikan::with('eviden')->where('user_id', $user->id)->get();
      if ($user->role == 'admin') {
        $data = Perbaikan::with('eviden')->get();
      }
      
      return view('perbaikan.history', ['listperbaikan' => $data, 'd_meta' => $d_meta, 'd_user' => $user]);
    }

    // admin - get data proses pengajuan
    public function proses()
    {
      $d_meta = [
        'title' => 'Admin - Proses Perbaikan'
      ];
      $user = Auth::user();
      $data = Perbaikan::with('eviden')->where('user_id', $user->id)->get();
      if ($user->role == 'admin') {
        $data = Perbaikan::with('eviden')->get();
      }
      
      return view('perbaikan.proses', ['listperbaikan' => $data, 'd_meta' => $d_meta, 'd_user' => $user]);
    }

    // admin - get data tutup pengajuan
    public function tutup()
    {
      $d_meta = [
        'title' => 'Admin - Tutup Perbaikan'
      ];
      $user = Auth::user();
      $data = Perbaikan::with('eviden')->where('user_id', $user->id)->get();
      if ($user->role == 'admin') {
        $data = Perbaikan::with('eviden')->get();
      }
      
      return view('perbaikan.tutup', ['listperbaikan' => $data, 'd_meta' => $d_meta, 'd_user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $user = Auth::user();
      $d_meta = [
        'title' => 'Insert Perbaikan',
      ];
      return view('perbaikan.create', ['d_meta' => $d_meta, 'd_user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerbaikanRequest $request)
    {
      $user = Auth::user();
      // validasi data
      $validData = $request->validated();
      // insert perbaikan
      $perbaikan = Perbaikan::create([
        'judul' => $validData['judul'],
        'keterangan' => $validData['keterangan'],
        'user_id' => $user->id
      ]);
      // upload file
      if ($request->hasFile('photo')) {
        $files = $request->file('photo');
        foreach ($files as $file) {
          $file->storeAs('public/eviden', $file->hashName());
          // insert eviden
          Eviden::create([
            'perbaikan_id' => $perbaikan->id,
            'filename' => $file->hashName()
          ]);
        }
      }
      if ($perbaikan) {
        return redirect(route('perbaikan.index'))->with('success', 'Data berhasil diinput!');
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $d_meta = [
        'title' => 'Edit Perbaikan',
      ];
      $perbaikan = Perbaikan::findOrFail($id);
      return view('perbaikan.edit', ['perbaikan' => $perbaikan, 'd_meta' => $d_meta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerbaikanRequest $request, string $id)
    {
      $perbaikan = Perbaikan::findOrFail($id);
      if ($perbaikan->update($request->validated())) {
        return redirect(route('perbaikan.index'))->with('success', 'Data berhasil diupdate!'); 
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $perbaikan = Perbaikan::findOrFail($id);
      if ($perbaikan->delete()) {
        return redirect(route('perbaikan.index'))->with('success', 'Data berhasil didelete!');
      }
      return redirect(route('perbaikan.index'))->with('error', 'Sorry, unable to delete this!');
    }

    public function dashadmin()
    {
      $d_meta = [
        'title' => 'Dashboard Admin'
      ];
      $user = Auth::user();
      return view('dashboard.admin', ['d_meta' => $d_meta, 'd_user' => $user]);
    }

    public function dashpegawai()
    {
      $d_meta = [
        'title' => 'Dashboard Pegawai'
      ];
      $user = Auth::user();
      return view('dashboard.pegawai', ['d_meta' => $d_meta, 'd_user' => $user]);
    }
}
