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

    #data-table_info {
        color:#eee!important
    }

    .pagination {
        justify-content: center!important
    }

    .page-item.active .page-link{
        border:0.5px solid #d8dbe0!important
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
                <option value="lecturer">Pembimbing</option>
                <option value="year">Tahun</option>
            </select><br>
            <input type="text" id="query" name="query" class="form-control w-50 m-auto" placeholder="Input Here">

            <button type="button" class="btn btn-light px-3 font-weight-bold mt-4" style="width: 135px;" id="searchButton">
                Search
            </button>
        </div>
        <div class="mb-5 table-responsive">
            <table class="table table-light w-75 m-auto" id="data-table">
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

        let dataTable = $('#data-table').DataTable({
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": load,
                "sLengthMenu": " _MENU_ ",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sSearch": "",
                "searchPlaceholder": "Ketik untuk mencari..",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            pageLength: 5,
            pagingType: "numbers",
            processing: true,
            serverSide: true,
            ajax: {
                url: `/essays`,
                data: function (d) {
                    d.filter_by = filterBy || null;
                    d.q = query || null;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (errorThrown == 'Unauthorized') {
                        sessionTimeout();
                    }
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false
                }, {
                    data: 'author.name'
                },
                {
                    data: 'title'
                },
                {
                    data: 'year'
                },
                {
                    data: 'detail',
                    className: "text-center",
                    searchable: false,
                    orderable: false
                }
            ],
            dom: `<'row '<'col-sm-12 d-none'lfB>>
                <'row no-gutters'<'col-sm-12 rounded overflow-auto'rt>>
                    <'row pageInfo'>
                        <'row mt-4 dataTable__footer'<'col-md-5 col-sm-6 text-left offset-md-2 mb-3 'i>
                            <'col-md-5 col-sm-6 mb-3 'p>>`,
        });

        $("#searchButton").on('click', function (e) {
            e.preventDefault()
            filterBy = $('#filter-by').val()
            query = $('#query').val()
            dataTable.draw();
        })
    });

</script>

@endpush
