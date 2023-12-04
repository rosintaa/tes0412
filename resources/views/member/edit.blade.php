@extends('layout.main')

@section('judul')
    EDIT MEMBER
@endsection

@section('konten')    
<div class="card p-4">
    <form method="post" action="{{ '/member/'.$data->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name='name' value="{{ $data->name }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ $data->password }}">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $data->phone_number }}">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $data->birthdate }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender">
                <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ktp_number" class="form-label">KTP Number</label>
            <input type="text" class="form-control" id="ktp_number" name="ktp_number" value="{{ $data->ktp_number }}">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" value="{{ $data->photo }}">
        </div>
        <div class="text-center">
            <a  href="/member" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection