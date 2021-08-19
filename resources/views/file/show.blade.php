@extends('layouts.app')
@push('styles')
<style>
    .file-section {
        background-color: #27bebe;
        color: #eee;
    }

    .pdf-file {
        margin-top: 20px;
        height: 800px;
        border: 2px solid #000;
        border-radius: 8px;
        width: 100%;
    }

    .caption {
        font-size: 14px;
        font-weight: 500
    }

</style>
@endpush
@section('content')
<div class="file-section pt-4">
    <div class="text-center">
        <h1 class="mb-3">{{$essay->title}}</h1>
        <h4>Nama Penulis : {{$essay->author->name}}</h4>
        <h4>Nama Pembimbing : <b>{{$essay->lecturer}}</b></h4>
    </div>
    <div style="padding:20px" class="col-md-10 offset-md-1">
        <h2 class="mt-4">Abstrak : </h2>
        <div class="caption">
            <p>{{$essay->abstract_id}}</p>
            <p>{{$essay->abstract_en}}</p>
        </div>
        <p style="font-size: 18px;font-weight:bold">Kata Kunci : {{$essay->keywords}}</p>
        <div class="mb-4">
            <button type="button" class="btn btn-light px-3 font-weight-bold" style="width: 185px;" id="viewFile">
                View File Skripsi
            </button>
            <iframe src="{{asset('file/essay/'.$essay->file)}}" class="pdf-file d-none" id="pdf-skripsi"></iframe>
        </div>
        <div class="mb-4">
            <button type="button" class="btn btn-light px-3 font-weight-bold" style="width: 185px;" id="viewJournal">
                View File Jurnal
            </button>
            <iframe src="{{asset('file/journal/'.$essay->journal)}}" class="pdf-file d-none" id="pdf-journal"></iframe>
        </div>
    </div>
</div>
@include('layouts.contact')

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script>
    $(document).on('click', '#viewFile', function () {
        let loggedId = {!!json_encode(Auth::user()) !!}
        if (loggedId) {
            $('#pdf-skripsi').removeClass('d-none')
        } else {
            alert('Anda harus login terlebih dahulu')
        }
    });

    $(document).on('click', '#viewJournal', function () {
        $('#pdf-journal').removeClass('d-none')
    });

</script>

@endpush
