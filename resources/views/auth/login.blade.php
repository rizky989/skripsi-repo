@extends('layouts.app')
@push('styles')
<style>
    .login-section {
        /* background-color: #27bebe; */
        color: #27bebe;
        height: 100%;
    }
    .login-box {
        /* border: 2px solid #27bebe; */
        background-color: #fff;
        border-radius: 8px
    }
    .login-label {
        font-size:14px;
        font-weight: bold
    }
</style>
@endpush
@section('content')
<div class="row login-section justify-content-md-center p-5">
    <div class="login-box p-5 text-center col-8">
        <h1 class="mb-5">Login</h1>
        <form>
            <div class="form-group row">
                <label for="email" name="email" class="col-md-4 col-form-label text-md-right login-label">Email : </label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" required >
                </div>
            </div>
            <div class="form-group row">
                <label for="password" name="password" class="col-md-4 col-form-label text-md-right login-label">Password : </label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required >
                </div>
            </div>
            <button type="submit" class="btn btn-light px-3 font-weight-bold mt-3"
                style="width: 185px; background-color:#27bebe;color:#eee">
                Login
            </button>
        </form>
    </div>
</div>

@endsection
