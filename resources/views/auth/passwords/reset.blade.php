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
        font-size: 14px;
        font-weight: bold
    }

</style>
@endpush
@section('content')
<div class="row login-section justify-content-md-center p-5">
    <div class="login-box p-5 text-center col-8">
        <form id="resetPasswordForm">
            @csrf {{method_field('POST')}}
            <h2 class="mb-5">Hi {{$user->name}}, Please enter new password</h2>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right login-label">Password :
                </label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password"
                        min="8" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right login-label">Confirmation Password
                    : </label>
                <div class="col-md-6">
                    <input id="password_confirmation" type="password" class="form-control"
                        name="password_confirmation" min="8" required>
                </div>
            </div>
            <button type="submit" class="btn btn-light px-3 font-weight-bold mt-3"
                style="width: 185px; background-color:#27bebe;color:#eee" id="submitReset">
                Submit
            </button>
        </form>
    </div>
</div>

@endsection
@push('scripts')
<script>
    const drawAlert = function (icon, color, message) {
        bootbox.alert({
            message: `<i class="fa ${icon} ${color} fa-lg mr-1"></i> ${message}`,
            size: 'medium',
            centerVertical: true,
            buttons: {
                ok: {
                    label: 'Ok',
                    className: 's-btn-pink',
                }
            },
            callback: function () {
                window.location.href = "/login";
            }
        })
    }
    $('#resetPasswordForm').on('submit', function (event) {
        event.preventDefault()
        if($('#password').val().length < 8) {
            alert('Minimal password 8 Karakter')
            return
        } else if($('#password').val() != $('#password_confirmation').val()) {
            alert('Konfirmasi password tidak sama')
            return
        }

        const formData = new FormData();
        formData.append("password", $('#password').val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': globalToken
            },
            url: "{{route('reset.submit', request()->segment(count(request()->segments())))}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function () {
                $('#submitReset').html(
                    '<span class="spinner-border spinner-border-sm" role="status"></span>'
                )
                $('#submitReset').attr('disabled', 'disabled')
            },
            success: function (data) {
                console.log('data', data)
                drawAlert('fa-check-circle', 'text-success', data.message)
            },
            error: function (data) {
                console.log('err', data)
                let errorCode = data.status;
                let message = errorCode === 422 ? data.responseJSON.message :
                    'Terjadi kesalahan, harap mencoba beberapa saat lagi';
                drawAlert('fa-times-circle', 'text-danger', message)
            },
            complete: function () {
                $('#submitReset').removeAttr('disabled')
                $('#submitReset').html('Submit')
            }
        });
    });
</script>

@endpush
