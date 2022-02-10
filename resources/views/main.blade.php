@extends('layouts/layout')

@section('container')
  


    <h2 class="mb-4 mt-4">Lacak keuangan kamu..</h2>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Jenis Kegiatan</th>
            <th scope="col">Nominal</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pengeluaran as $peng)
          <tr>
            <td>{{ $no+=1 }}</td>
            <td>{{ $peng->nama_kegiatan }}</td>
            <td>{{ $peng->jenis_kegiatan }}</td>
            <td>{{ $peng->jenis_kegiatan == 'Kredit' ? '+ Rp.' . format_uang($peng->debit) : '- Rp.' . format_uang($peng->debit) }}</td>
            <td>{{ $peng->created_at }}</td>
            <td>
              <form action="/index/{{ $peng->id }}" method="POST">
                @method('delete')
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $peng->id }}">
                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Kamu yakin?')">Delete</button>
              </form>
            </td>
          </tr>    
          @endforeach
          <tr>
            <td colspan="3" style="text-align: end"><strong>Total :</strong></td>
            <td colspan="3"><strong>{{ 'Rp.' . format_uang($total[0]->total) }}</strong></td>
          </tr>
        </tbody>
      </table>
    </div>
  
@endsection
    