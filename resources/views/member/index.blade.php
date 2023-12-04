@extends('layout.mainMember')

@section('judul')
    DATA MEMBER
@endsection

@section('konten')    
<a href="/member/create" class="btn btn-primary mb-3">Pendaftaran Member</a>
<div class="card">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Gender</th>
                        <th scope="col">KTP Number</th>
                        <th>OPSI</th>
                        <!-- Add other columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>
                                @if($item->photo)
                                    <img src="{{ asset($item->photo) }}" alt="Member Photo" class="img-thumbnail" width="50">
                                @else
                                    No Photo
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->birthdate }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->ktp_number }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ url('/member/'.$item->id.'/edit') }}">EDIT</a>
                                <form class="d-inline" onsubmit="return confirm('yakin hapus?')" action="{{ '/member/'.$item->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                                </form>
                            </td>
                            <!-- Add other columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection