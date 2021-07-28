@extends('layouts.app')
@push('styles')
<style>
    .profile-section {
        /* background-color: #27bebe; */
        color: #27bebe;
        background-color: #fff;
        height: 100%;
    }

    .profile-box {
        border: 2px solid #27bebe;
        border-radius: 8px
    }

    .form-label {
        font-size: 14px;
        font-weight: bold
    }

    .nav.nav-tabs {
        float: left;
        display: block;
        margin-right: 20px;
        border-bottom: 0;
        border-right: none!important;
        width: 100%;
        font-size:18px;
    }

    .nav-tabs .nav-link {
        border-top-left-radius: .25rem!important;
        border-bottom-left-radius: .25rem!important;
        border-top-right-radius: .25rem!important;
        background: #fff;
        color: #27bebe;
    }

    .nav-tabs .nav-link.active {
        color: #fff;
        background-color: #27bebe !important;
        border-color: transparent !important;
    }

    .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: 0rem !important;
        border-top-right-radius: 0rem !important;
    }

    .tab-content>.active {
        display: block;
        height: 100%
    }

    .nav.nav-tabs {
        float: left;
        display: block;
        margin-right: 20px;
        border-bottom: 0;
        border-right: 1px solid transparent;
        padding-right: 15px;
    }

</style>
@endpush
@section('content')
<div class="row profile-section justify-content-md-center p-5">
    <div class="row profile-box p-0 text-center col-10">
        <div class="col-md-4 col-sm-12 p-0 text-left" style="border-right: 2px solid #27bebe!important;">
            <img src="{{asset('image/avatar.png')}}" width="80px" />
            <ul class="nav nav-tabs p-0 m-0" id="myTab" role="tabDaftar">
                @unlessrole('student')
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#list-student" role="tab" aria-controls="list-student">Daftar Mahasiswa</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link @role('student') active @endrole " data-toggle="tab" href="#publish" role="tab" aria-controls="publish">Publish Skripsi</a>
                </li>
                @endunlessrole
                @role('superadmin')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#list-teacher" role="tab" aria-controls="list-student">Daftar Dosen</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#reset" role="tab"
                        aria-controls="reset">Reset Password</a>
                </li>
                @endrole
                <li class="nav-item">
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link w-100 text-left" type="submit">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
    </div>
        <div class="col-md-8 col-sm-12 p-0">
            <div class="tab-content px-4" style="height: 100%">
                @unlessrole('student')
                <div class="tab-pane active" id="list-student" role="tabpanel">@include('users.student.index')</div>
                @else
                <div class="tab-pane active" id="publish" role="tabpanel">@include('file.create')</div>
                @endunlessrole
                @role('superadmin')
                <div class="tab-pane" id="list-teacher" role="tabpanel">@include('users.teacher.index')</div>
                @else
                <div class="tab-pane" id="reset" role="tabpanel">@include('auth.reset_password')</div>
                @endrole
            </div>
        </div>
    </div>
</div>

@endsection
