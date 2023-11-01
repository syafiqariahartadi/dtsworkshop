<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Siswa::paginate(5);
        return view('siswa' ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nis' =>'required',
            'nm' =>'required',
            'kls' =>'required',
            'jkl' =>'required',
            'tlp' =>'required',
            'alamat' =>'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        //proses upload foto
        if($request->file('foto') == "") {
            $simpan=Siswa::create([
                'nis' =>$request->nis,
                'nama' =>$request->nm,
                'kelas' =>$request->kls,
                'jenis_kelamin' =>$request->jkl,
                'telp' => $request->tlp,
                'alamat_domisili' => $request->alamat,
                'foto'=> 'avatar.png'
            ]);
            
        }elseif($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->move(public_path('foto'),$image->getClientOriginalName());

            $simpan = Siswa::create([
                    'nis' => $request->nis,
                    'nama' => $request->nm,
                    'kelas' => $request->kls,
                    'jenis_kelamin' => $request->jkl,
                    'telp' => $request->tlp,
                    'alamat_domisili' => $request->alamat,
                    'foto' => $image->getClientOriginalName()
                ]);
        }
        if($simpan){
            //redirect dengan pesan sukses
            Alert::success('Simpan Data', 'data siswa sukses di simpan');
            return redirect('/')->with(['success' => 'Data Berhasil Disimpan!']);
            
        }else{
            //redirect dengan pesan eror
            Alert::error('Simpan Data', 'data siswa gagal di simpan');
            return redirect('/')->with(['eror' =>'Data Gagal DiSimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=Siswa::find($id);
        return view('siswa',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'nis' => 'required',
            'nm' => 'required',
            'kls' => 'required',
            'jkl' => 'required',
            'tlp' => 'required',
            'alamat' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
            ]);
            
            $upd = Siswa::find($id);
            if($request->file('foto') == "") {
            $upd->update([
            'nis' => $request->nis,
            'nama' => $request->nm,
            'kelas' => $request->kls,
            'jenis_kelamin' => $request->jkl,
            'telp' => $request->tlp,
            'alamat_domisili' => $request->alamat,
            ]);
            } else {
            //proses upload gambar baru
            $image = $request->file('foto');
            
            $image->move(public_path('foto'),$imge->getClientOriginalName());
            
          
            
            $upd ->update([
            'nis' => $request->nis,
            'nama' => $request->nm,
            'kelas' => $request->kls,
            'jenis_kelamin' => $request->jkl,
            'telp' => $request->tlp,
            'alamat_domisili' => $request->alamat,
            'foto' => $image->getClientOriginalName()
            ]);
            }
            if($upd){
            //redirect dengan pesan sukses
            Alert::success('Ubah Data', 'data siswa sukses diubah');
            
            return redirect('/');
            }else{
             //redirect dengan pesan error
            Alert::error('Ubah Data', 'data siswa gagal di ubah');
            return redirect('/');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $del=Siswa::find($id);
        $del->delete();
        if($del){
            Alert::success('Hapus Data', 'data siswa sukses di hapus');
            return redirect('/');
        }else{
            Alert::error('Hapus Data', 'data siswa gagal di hapus');
            return redirect('/');
        }
    }

    public function search(Request $request)
    {
        {
            $keyword = $request->cari; //cari adalah name dari input
            $data =Siswa::where('nis', 'like', "%" . $keyword . "%") ->paginate(5);
             return view('siswa', compact(['data']))->with('i', (request()->input('page', 1) - 1) * 5);
            }
    }

}
