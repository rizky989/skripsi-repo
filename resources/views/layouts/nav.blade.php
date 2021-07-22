<nav class="navbar navbar-expand-lg w-100" style="background-color: ">
    <a class="navbar-brand" href="/">
        <img src="{{asset('image/logo.jpeg')}}" width="40px" />
        <p style="color:#27bebe;display: inline; margin-left:20px">Website Repositori Broadband Multimedia</p>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" style="color:#27bebe;" href="/">Beranda</span></a>
            <a class="nav-item nav-link" style="color:#27bebe;" href="#search">Pencarian</a>
            <a class="nav-item nav-link" style="color:#27bebe;" href="#contact">Kontak Kami</a>
            @if (Auth::user())
            <a class="nav-item nav-link" style="color:#27bebe;" href="/profile">Profile</a>
            @else
            <a class="nav-item nav-link" style="color:#27bebe;" href="/login">Login</a>
            @endif
        </div>
    </div>
</nav>
