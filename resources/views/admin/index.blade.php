@extends('layout.main')

@section('judul')
    DATA USER
@endsection

@section('konten')    
<a href="/admin/create" class="btn btn-primary mb-3">Tambah User</a>
<div class="card">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th>OPSI</th>
                        <!-- Add other columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ url('/admin/'.$item->id.'/edit') }}">EDIT</a>
                                <form class="d-inline" onsubmit="return confirm('yakin hapus?')" action="{{ '/admin/'.$item->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection