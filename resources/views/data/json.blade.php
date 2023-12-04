@extends('layout.main')

@section('judul')
Data Member Dalam Bentuk JSON
@endsection

@section('konten')    
<div class="card">
    <div>
        <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
    </div>
</div>
@endsection