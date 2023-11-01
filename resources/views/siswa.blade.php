@extends('layout.master') 
@section('content')
@include('sweetalert::alert')
    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search" method="get" action="/">
                <input type="text" name="cari" class="form-control w-75 d-inline" id="search"
                    placeholder="Masukkan NIS Siswa">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
        </div>
    </div>
    <div class="container">
        <h3 class="mt-4">Data Siswa
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswa"> Tambah
            </button>

            <div class="table-responsive">
                <table class="table table-hover table-borderless">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telp</th>
                            <th>Alamat</th>
                            <th>Olah Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?> <tr>
                            @foreach ($data as $ds)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="{{ asset('foto/' . $ds->foto) }}" width="100%"></td>
                            <td>{{ $ds->nis }}</td>
                            <td>{{ $ds->nama }}</td>
                            <td>{{ $ds->kelas }}</td>
                            <td>{{ $ds->jenis_kelamin }}</td>
                            <td>{{ $ds->telp }}</td>
                            <td>{{ $ds->alamat_domisili }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah{{$ds->id}}">Ubah</button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus{{$ds->id}}">Hapus</button>"
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <form method="post" action="/" enctype='multipart/form-data'>
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">NIS</label>
                          <input type="text" class="form-control" name="nis" placeholder="masukkan nis siswa">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nm" placeholder="masukkan nama siswa">
                        </div><div class="mb-3">
                          <label class="form-label">Kelas</label>
                          <input type="text" class="form-control" name="kls" placeholder="masukkan kelas">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Jenis Kelamin </label>
                            <select class="form-select" name="jkl">
                              <option selected>Pilih Jenis Kelamin</option>
                              <option value="laki laki">Laki-Laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>
                        <div class="mb-3">
                          <label class="form-label">Telp</label>
                          <input type="text" class="form-control" name="tlp" placeholder="masukkan no. telp siswa">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Alamat Domisili</label>
                          <textarea class="form-control" name="alamat" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Foto Siswa:</label>
                          <img id="preview-image-before-upload" alt="preview foto" style="max-height: 200px;">
                          <br><input class="form-control" type="file" name="foto" id="image">
                        </div>
                      
                 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Understood</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    </div>
  


<!-- Modal hapus --> 
@foreach($data as $ds)
 <div class="modal fade" id="hapus{{$ds->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Siswa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h4 class="text-center">Apakah anda yakin menghapus data siswa <span>
                <font color="blue">{{$ds->nama}}</font>
              </span>
            </h4>
          </div>
          <div class="modal-footer">
            <form action="/{{$ds->id}}" method="POST"> 
              @csrf
               @method('delete') 
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak Jadi</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div> @2023 RPL- Sepik
        </div>
      </div>
    </div>

    <!-- Modal ubah-->
<div class="modal fade" id="ubah{{$ds->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-
scrollable"> @2023 RPL- Siswanto <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Simpan Data Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form" action="/{{$ds->id}}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT') <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" class="form-control" name="nis" value="{{$ds->nis}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nm" value="{{$ds->nama}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kls" value="{{$ds->kelas}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jkl">
              <option value="{{$ds->jenis_kelamin}}" selected>{{$ds->jenis_kelamin}}</option>
              <option value="laki-laki">Laki-Laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Telp</label>
            <input type="text" class="form-control" name="tlp" value="{{$ds->telp}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat Domisili</label>
            <textarea class="form-control" name="alamat" rows="3">{{$ds->alamat_domisili}}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Foto Siswa:</label>
            <img id="preview-foto" alt="preview foto" style="max-height: 200px">
            <br> <input class="form-control" type="file" name="foto" id="imageUbah">
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div> @2023 RPL- Siswanto </form>
    </div>
  </div>
</div>
    @endforeach
  
   
    <script type="text/javascript">

    $(document).ready(function (e) {

      $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
          $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
      });
      
    });
    </script>
    <script type="text/javascript">

      $(document).ready(function (er) {
        $('#imageUbah').change(function() {
          let reader2 = new FileReader();
          reader2.onload =(er) => {
            $('#preview-foto').attr('src', er.target.result);
          }
          reader2.readAsDataURL(this.files[0]);
        });
      });
    </script>

    @endsection
