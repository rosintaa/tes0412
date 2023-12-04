@extends('layout.main')

@section('judul')
    EDIT ADMIN
@endsection

@section('konten')    
<div class="card p-4">
    <form method="post" action="{{ '/admin/'.$data->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name='name' value="{{ $data->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ $data->password }}">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="administrator" {{ $data->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                <option value="member" {{ $data->role == 'member' ? 'selected' : '' }}>Member</option>
            </select>
        </div>
        <div class="text-center">
            <a  href="/admin" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection