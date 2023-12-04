@extends('layout.main')

@section('judul')
    CREATE USER
@endsection

@section('konten')    
<div class="card p-4">
    <form method="post" action="/admin">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name='name' value="{{ old('name', Session::get('nama')) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Session::get('email')) }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="administrator" {{ old('role') == 'administrator' ? 'selected' : '' }}>Administrator</option>
                <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
            </select>
        </div>
        <div class="text-center">
            <a  href="/admin" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection