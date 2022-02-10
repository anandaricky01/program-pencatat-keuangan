@extends('layouts/layout')

@section('container')
    <h1 class="mb-5">Buat Data Anggaran</h1>
    <form action="/index" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <label class="form-label" for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan" name="nama_kegiatan" required value="{{ old('nama_kegiatan') }}">
                @error('nama_kegiatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label  class="form-label mt-3" for="debit">Dana Masuk/Dikeluarkan</label>
                <input type="text" class="form-control @error('debit') is-invalid @enderror" id="debit" name="debit" required value="{{ old('debit') }}">
                @error('debit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label  class="form-label mt-3" for="jenis_kegiatan">Jenis Kegiatan</label>
                <select class="form-select" id="jenis_kegiatan" name="jenis_kegiatan">
                    <option selected style="color: rgb(208, 222, 235)">Pilih salah satu..</option>
                    <option value="Debit">Debit</option>
                    <option value="Kredit">Kredit</option>
                </select>
            </div>
            <div class="col-6">
                <label for="" class="form-label">Mohon Dibaca!</label>
                <div class="alert alert-primary" role="alert">
                    1. Masukan nama kegiatan dengan jelas! <br>
                    2. Masukan jumlah nominal hanya dengan angka! <br>
                    3. Mohon untuk selalu berhemat!
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

