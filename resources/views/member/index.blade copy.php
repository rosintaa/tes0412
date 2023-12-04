@extends('layout/template')

@section('konten')
<div>
    <h1>Data Member</h1>    
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>KTP Number</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->birthdate }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->ktp_number }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection
