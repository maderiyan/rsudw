<?php

namespace App\Http\Controllers\Api;

use App\Models\Eviden;
use App\Models\Perbaikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerbaikanResource;
use Illuminate\Support\Facades\Validator;

class PerbaikanController extends Controller
{
  public function index()
  {
    $data = Perbaikan::with('eviden')->get();

    // $response = [
    //   'success' => true,
    //   'data' => $data,
    //   'message' => 'list data perbaikan' 
    // ];
    // return response()->json($response);
    return new PerbaikanResource(true, 'list data', $data);
  }

  public function store(Request $request)
  {
    // validasi data
    $validator = Validator::make($request->all(), [
      'judul' => 'required|max:100',
      'keterangan' => 'required'
    ]);
    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => $validator->errors(),
        'data' => []
      ], 422);
    }
    // insert perbaikan
    $perbaikan = Perbaikan::create([
      'judul' => $request->judul,
      'keterangan' => $request->keterangan
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
      return new PerbaikanResource(true, 'Data berhasil diinput', $perbaikan);
    }
  }
}
