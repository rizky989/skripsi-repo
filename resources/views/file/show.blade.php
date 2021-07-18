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

    .caption {
        font-size:14px;
        font-weight: 500
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
        <h2 class="mt-4">Daftar Pustaka : </h2>
        <div class="caption">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor metus id mauris elementum hendrerit.
                Donec sapien dui, aliquam in leo et, interdum dignissim nisl. Proin eu nisl ut ipsum congue condimentum. Nullam
                ac nisi vitae leo scelerisque ornare eu et nisl. Donec ultricies libero lectus, eu finibus arcu dapibus non.
                Quisque pellentesque magna sit amet libero tincidunt, eu vestibulum ex sollicitudin. Nulla vestibulum ornare
                magna, molestie pellentesque dui elementum quis. Nulla porta quis dolor a varius. Donec posuere maximus leo, non
                sollicitudin erat aliquet at. Aliquam vel lorem orci. Etiam faucibus mollis ullamcorper. Vestibulum suscipit
                mattis fermentum. Sed porttitor orci quam, ac consequat dolor vestibulum vel. Nunc ullamcorper nisl dolor, at
                iaculis nunc faucibus maximus.</p>

            <p>Praesent mauris ligula, mollis a sollicitudin quis, finibus eu tellus. Donec luctus risus in vestibulum cursus.
                Nullam fringilla lacus in velit varius, et tempus eros consectetur. Class aptent taciti sociosqu ad litora
                torquent per conubia nostra, per inceptos himenaeos. Sed tempus urna at risus tempus accumsan. Praesent at
                convallis diam. Phasellus accumsan bibendum mi sed tincidunt. Donec id posuere mi. Integer turpis velit, maximus
                sed viverra eu, tristique quis massa. Suspendisse eleifend nec velit a blandit. Nulla ac iaculis ante. Nullam
                mattis, ex vitae semper vulputate, lorem enim molestie ex, et fermentum mauris felis eu ligula. In imperdiet
                nunc purus, id pretium justo sagittis sed. Donec elementum nisl nec ligula imperdiet, a blandit mauris congue.
                Pellentesque vulputate, erat sit amet luctus vestibulum, nisl tortor ultrices ex, ut posuere eros mauris ut
                erat. Donec in quam consectetur, vulputate dolor sit amet, bibendum dui.</p>
        </div>
        <p style="font-size: 18px;font-weight:bold">Kata Kunci : keyword1, keyword2, keyword3, keyword4</p>
    </div>
</div>
@include('layouts.contact')

@endsection
