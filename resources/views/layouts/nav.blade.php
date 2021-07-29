{{-- <nav class="navbar navbar-expand-lg w-100" style="background-color: ">
    <a class="navbar-brand" href="/">
        <img src="{{asset('image/logo.jpeg')}}" width="40px" />
<p style="color:#27bebe;display: inline; margin-left:20px">Web Repositori Broadband Multimedia</p>
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" style="color:#27bebe;" href="/">Beranda</span></a>
        @if (Request::routeIs('home.page'))
        <a class="nav-item nav-link" style="color:#27bebe;" href="#search">Pencarian</a>
        @endif
        @if (Request::routeIs('home.page') || Request::routeIs('detail.page'))
        <a class="nav-item nav-link" style="color:#27bebe;" href="#contact">Kontak Kami</a>
        @endif
        @if (Auth::user())
        <a class="nav-item nav-link" style="color:#27bebe;" href="/profile">Profile</a>
        @else
        <a class="nav-item nav-link" style="color:#27bebe;" href="/login">Login</a>
        @endif
    </div>
</div>
</nav> --}}
<nav class="navbar navbar-expand-lg navbar-light w-100">
    <a class="navbar-brand" href="/">
        <img src="{{asset('image/logo.jpeg')}}" width="40px" />
        <p style="color:#27bebe;display: inline; margin-left:20px">Web Repositori Broadband Multimedia</p>
    </a>
    <button class="navbar-toggler" type="button" id="togglerNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" style="color:#27bebe;" href="/">Beranda</span></a>
            @if (Request::routeIs('home.page'))
            <a class="nav-item nav-link" style="color:#27bebe;" href="#search">Pencarian</a>
            @endif
            @if (Request::routeIs('home.page') || Request::routeIs('detail.page'))
            <a class="nav-item nav-link" style="color:#27bebe;" href="#contact">Kontak Kami</a>
            @endif
            @if (Auth::user())
            <a class="nav-item nav-link" style="color:#27bebe;" href="/profile">Profile</a>
            @else
            <a class="nav-item nav-link" style="color:#27bebe;" href="/login">Login</a>
            @endif
        </div>
    </div>
</nav>

@push('scripts')
<script>
    $(document).on('click', '#togglerNav', function (e) {
        if($("#navbarNavAltMarkup").hasClass("show")) {
            $("#navbarNavAltMarkup").removeClass("show")
        } else {
            $("#navbarNavAltMarkup").addClass("show")
        }
    });
</script>
@endpush
