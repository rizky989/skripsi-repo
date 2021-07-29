@extends('layouts.app')
@push('styles')
<style>
    .carousel-item {
        background-color: #27bebe;
        border: 2px solid #fefefe;
        height: auto;
        max-height: 650px;
        border-radius: 8px
    }

    .caption {
        font-size: 14px;
        font-weight: 500
    }

    .list-box {
        background-color: #27bebe;
        /* border-top: 3px solid #bbb;
        border-bottom: 3px solid #bbb; */
    }

    .search-section {
        /* padding: 0 180px 0 180px */
    }

</style>
@endpush
@section('content')
<div>
    <div id="carouselExampleIndicators" class="carousel slide px-5 py-3" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('image/banner_1.jpeg')}}"
                    style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner_2.jpeg')}}"
                    style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner_3.jpeg')}}"
                    style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner_4.jpeg')}}"
                    style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner_5.jpeg')}}"
                    style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner_6.jpeg')}}"
                    style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner_7.jpeg')}}"
                    style='height: 100%; width: 100%; object-fit: fill'>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="px-5 py-3 caption">
        <p>Repository Program Studi Broadband Multimedia Politeknik Negeri Jakarta adalah layanan digital yang mengumpulkan,
            merawat dan menyebarkan. Repository layanan digital yang memanfaatkan teknologi web dapat
            memberikan kemudahan pengguna untuk memenuhi kebutuhan informasi.</p>
    </div>
</div>
<div class="list-box text-center p-4" id="search">
    <h2 class="mb-4" style="color: #eee;">Pencarian</h2>
    <div class="px-2">
        <div class="search-section mb-4">
            <select class="form-control w-50 m-auto" id="filter-by">
                <option value="title">Judul</option>
                <option value="author">Penulis</option>
                <option value="year">Tahun</option>
            </select><br>
            <input type="text" id="query" name="query" class="form-control w-50 m-auto" placeholder="Input Here">

            <button type="button" class="btn btn-light px-3 font-weight-bold mt-4" style="width: 135px;" id="searchButton">
                Search
            </button>
        </div>
        <div class="mb-5 table-responsive">
            <table class="table table-light w-75 m-auto" id="fileTable">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.contact')

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        let filterBy, query = '';

        const loadTable = function (filterBy, query) {
            let url = `/essays?filter_by=${filterBy}&q=${query}`
            $.ajax({
                type: "GET",
                cache: false,
                url: url,
                beforeSend: function () {
                    $('#searchButton').attr('disabled', 'disabled');
                },
                success: function (data) {
                    $('#fileTable tbody').empty()
                    if (data.length > 0) {
                        $.each(data, function (i, item) {
                            let trHtml = '<tr>' +
                                '<td>' + (i+1) + '</td>' +
                                '<td>' + item.author.name + '</td>' +
                                '<td>' + item.title + '</td>' +
                                '<td>' + moment(item.date, 'YYYY-MM-DD').format("YYYY") + '</td>' +
                                '<td>' + `<a href="/file/${item.id}"+>
                                    <button type="button" class="btn btn-light px-3 font-weight-bold"
                                        style="width: 135px;">
                                        PDF
                                    </button>
                                </a>` + '</td>' +
                                '</tr>';
                            $('#fileTable tbody').append(trHtml);
                        });
                    } else {
                        let trHtml = '<tr>' +
                                '<td colspan="5" style="text-align:center"> Data tidak ditemukan </tr>';
                        $('#fileTable tbody').append(trHtml);
                    }
                },
                error: function (data) {
                    console.error('error : ', data)
                },
                complete: function () {
                    $('#searchButton').removeAttr('disabled');
                }
            })
        }

        $("#searchButton").on('click', function (e) {
            e.preventDefault()
            let inputFilterBy = $('#filter-by').val()
            let inputQuery = $('#query').val()
            loadTable(inputFilterBy, inputQuery)
        })

        loadTable()
    });

</script>

@endpush
