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
        <h1 class="mb-3">Perancangan penyiram</h1>
        <h4>Nama Penulis : Davit</h4>
        <h4>Nama Pembimbing : <b>Nama Dosen</b></h4>
    </div>
    <div style="padding:20px 150px">
        <h2 class="mt-4">Daftar Pustaka : </h2>
        <div class="caption">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum auctor metus id mauris elementum
                hendrerit.
                Donec sapien dui, aliquam in leo et, interdum dignissim nisl. Proin eu nisl ut ipsum congue condimentum.
                Nullam
                ac nisi vitae leo scelerisque ornare eu et nisl. Donec ultricies libero lectus, eu finibus arcu dapibus
                non.
                Quisque pellentesque magna sit amet libero tincidunt, eu vestibulum ex sollicitudin. Nulla vestibulum
                ornare
                magna, molestie pellentesque dui elementum quis. Nulla porta quis dolor a varius. Donec posuere maximus
                leo, non
                sollicitudin erat aliquet at. Aliquam vel lorem orci. Etiam faucibus mollis ullamcorper. Vestibulum
                suscipit
                mattis fermentum. Sed porttitor orci quam, ac consequat dolor vestibulum vel. Nunc ullamcorper nisl
                dolor, at
                iaculis nunc faucibus maximus.</p>

            <p>Praesent mauris ligula, mollis a sollicitudin quis, finibus eu tellus. Donec luctus risus in vestibulum
                cursus.
                Nullam fringilla lacus in velit varius, et tempus eros consectetur. Class aptent taciti sociosqu ad
                litora
                torquent per conubia nostra, per inceptos himenaeos. Sed tempus urna at risus tempus accumsan. Praesent
                at
                convallis diam. Phasellus accumsan bibendum mi sed tincidunt. Donec id posuere mi. Integer turpis velit,
                maximus
                sed viverra eu, tristique quis massa. Suspendisse eleifend nec velit a blandit. Nulla ac iaculis ante.
                Nullam
                mattis, ex vitae semper vulputate, lorem enim molestie ex, et fermentum mauris felis eu ligula. In
                imperdiet
                nunc purus, id pretium justo sagittis sed. Donec elementum nisl nec ligula imperdiet, a blandit mauris
                congue.
                Pellentesque vulputate, erat sit amet luctus vestibulum, nisl tortor ultrices ex, ut posuere eros mauris
                ut
                erat. Donec in quam consectetur, vulputate dolor sit amet, bibendum dui.</p>
        </div>
        <p style="font-size: 18px;font-weight:bold">Kata Kunci : keyword1, keyword2, keyword3, keyword4</p>
        <button type="button" class="btn btn-light px-3 font-weight-bold" style="width: 185px;" id="viewFile">
            View File
        </button>
        <iframe src="{{asset('image/test.pdf')}}" class="pdf-file d-none"></iframe>
        <iframe id="pdf-canvas" class="d-none"></iframe>
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
            $('.pdf-file').removeClass('d-none')
        } else {
            alert('Anda harus login terlebih dahulu')
        }
        // let file = {!!json_encode(Auth::user()) !!}
        var loadingTask = PDFJS.getDocument("/test.pdf");
        loadingTask.promise.then(
            function (pdf) {
                // Load information from the first page.
                pdf.getPage(1).then(function (page) {
                    var scale = 1;
                    var viewport = page.getViewport(scale);

                    // Apply page dimensions to the <canvas> element.
                    var canvas = document.getElementById("pdf-canvas");
                    var context = canvas.getContext("2d");
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render the page into the <canvas> element.
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext).then(function () {
                        console.log("Page rendered!");
                    });
                });
            },
            function (reason) {
                console.error(reason);
            }
        );
    });

</script>

@endpush
