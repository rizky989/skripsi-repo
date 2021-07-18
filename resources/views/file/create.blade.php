@extends('layouts.app')
@push('styles')
<style>
    .file-section {
        background-color: #27bebe;
        color: #eee;
    }

    .pdf-file {
        margin-top:20px;
        height:800px;
        border: 2px solid #000;
        border-radius: 8px;
        width: 100%;
    }
</style>
@endpush
@section('content')
<div class="file-section pt-4">
    <div class="text-center">
        <h1 class="mb-3">Perancangan penyiram</h1>
        <h4>Nama Penulis : Davit</h4>
        <h4>Nama Pembimbing : <b>Nama Dosen</b></h4>
    </div>
    <div style="padding:20px 150px">
        <button type="button" class="btn btn-light px-3 font-weight-bold"
            style="width: 185px;">
            Download this PDF
        </button>
        <iframe src="{{asset('image/test.pdf')}}" class="pdf-file"></iframe>
        {{-- <embed src="{{asset('image/test.pdf')}}" class="pdf-file"/> --}}
        {{-- <div class="pdf-file">

        </div> --}}
    </div>
</div>
@include('layouts.contact')

@endsection
