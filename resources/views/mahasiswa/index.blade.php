@extends('mahasiswa.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form class="form" method="GET" action="{{route('search')}}">
        <div class="form-group w-100 mb-3">
            <label for="search" class="d-block mr-2">Search</label>
            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Input Keyword">
            <button type="submit" class="btn btn-primary mb-1">Search</button>
        </div>
    </form>
    
    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>No_Handphone</th>
            <th>TanggalLahir</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswa as $Mahasiswa)
            <tr>

                <td>{{ $Mahasiswa->Nim }}</td>
                <td>{{ $Mahasiswa->Nama }}</td>
                <td>{{ $Mahasiswa->Kelas->nama_kelas}}</td>
                <td>{{ $Mahasiswa->Email }}</td>
                <td>{{ $Mahasiswa->Jurusan }}</td>
                <td>{{ $Mahasiswa->No_Handphone }}</td>
                <td>{{ $Mahasiswa->TanggalLahir }}</td>
                <td>
                    <form action="{{ route('mahasiswa.destroy', $Mahasiswa->Nim) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mahasiswa.show', $Mahasiswa->Nim) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $Mahasiswa->Nim) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$mahasiswa->links()}}
@endsection
