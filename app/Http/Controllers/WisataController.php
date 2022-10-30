<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
// use model gambarwisata
use App\Models\GambarWisata;
use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateWisataRequest;
use File;
use Illuminate\Support\Str;
// uese request
use Illuminate\Http\Request;
// use storage
use Illuminate\Support\Facades\Storage;
class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::all();
        $gambar_wisata = GambarWisata::all();
     
        return view('pages.backsite.wisata.index', compact('wisata', 'gambar_wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backsite.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data = [
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'thumbnail' => $request->hasFile('thumbnail'),
        ];
        $path = public_path('app/public/assets/file-wisata');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-wisata');
        }

        // change file locations
        if(isset($data['thumbnail'])){
            $data['thumbnail'] = $request->file('thumbnail')->store(
                'assets/file-wisata', 'public'
            );
        }else{
            $data['thumbnail'] = "";
        }

       
        $wisata = Wisata::create($data);

        

        foreach ($request->file('gambar') as $gambar) {
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'storage/assets/foto-foto-wisata';
            $gambar->move($tujuan_upload,$nama_gambar);

            $dudata = [
                'wisata_id' => $wisata->id,
                'gambar' => $tujuan_upload.'/'.$nama_gambar,
            ];
            GambarWisata::create($dudata);
        }

        return redirect()->route('wisata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWisataRequest  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWisataRequest $request, Wisata $wisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        //
    }
}
