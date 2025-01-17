@extends('admin.layouts')

@section('content')
    <h1>Kelola Program Keahlian - {{ $bidangKeahlian->bidang_keahlian }}</h1>

    <a href="{{ route('admin.program-keahlian.create', $bidangKeahlian->id_bidang_keahlian) }}" class="btn btn-primary">Tambah
        Program Keahlian</a>

    <table class="table">
        <thead>
            <tr>
                <th>Kode Program Keahlian</th>
                <th>Program Keahlian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programKeahlian as $program)
                <tr>
                    <td>{{ $program->kode_program_keahlian }}</td>
                    <td>{{ $program->program_keahlian }}</td>
                    <td>
                        <a href="{{ route('admin.program-keahlian.edit', $program->id_program_keahlian) }}"
                            class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.program-keahlian.destroy', $program->id_program_keahlian) }}"
                            method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <a href="{{ route('admin.bidang-keahlian.manageConcentrations', $program->id_program_keahlian) }}"
                            class="btn btn-info">Kelola Konsentrasi Keahlian</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
