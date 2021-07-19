@extends('layouts.app')
@push('styles')
<style>
    .carousel-item {
        background-color: #27bebe;
        border: 2px solid #fefefe;
        height: 450px;
        border-radius: 8px
    }

    .caption {
        font-size:14px;
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
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('image/banner.jpeg')}}" alt="First slide" style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner.jpeg')}}" alt="Second slide" style='height: 100%; width: 100%; object-fit: fill'>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/banner.jpeg')}}" alt="Third slide" style='height: 100%; width: 100%; object-fit: fill'>
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
</div>
<div class="list-box text-center p-4" id="search">
    <h2 class="mb-4" style="color: #eee;">Pencarian</h2>
    <div class="px-5">
        <div class="search-section mb-4">
            <select class="form-control w-50 m-auto">
                <option value="title">Judul</option>
                <option value="author">Penulis</option>
                <option value="year">Tahun</option>
            </select><br>
            <input type="text" id="query" name="query" class="form-control w-50 m-auto"
                placeholder="Input Here">

            <button type="button" class="btn btn-light px-3 font-weight-bold mt-4"
                style="width: 135px;">
                Search
            </button>
        </div>
        <div class="mb-5">
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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Davit</td>
                        <td>Perancangan penyiram</td>
                        <td>2016</td>
                        <td style="text-center p-0">
                            <a href="/file/1">
                                <button type="button" class="btn btn-light px-3 font-weight-bold"
                                    style="width: 135px;">
                                    PDF
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kristianto</td>
                        <td>Website Repository</td>
                        <td>2016</td>
                        <td style="text-center p-0">
                            <button type="button" class="btn btn-light px-3 font-weight-bold"
                                style="width: 135px;">
                                PDF
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Cynthia</td>
                        <td>Website Toko OnlinePatata</td>
                        <td>2017</td>
                        <td style="text-center p-0">
                            <button type="button" class="btn btn-light px-3 font-weight-bold"
                                style="width: 135px;">
                                PDF
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Citra</td>
                        <td>Website Coffe Shop</td>
                        <td>2017</td>
                        <td style="text-center p-0">
                            <button type="button" class="btn btn-light px-3 font-weight-bold"
                                style="width: 135px;">
                                PDF
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Mega</td>
                        <td>Rancang Bangun Aplikasi</td>
                        <td>2017</td>
                        <td style="text-center p-0">
                            <button type="button" class="btn btn-light px-3 font-weight-bold"
                                style="width: 135px;">
                                PDF
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.contact')

@endsection
