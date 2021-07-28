<h2 class="py-4">Change Password</h2>
<form id="resetPasswordForm">
    @csrf
    <div class="form-group">
        <label for="email" name="email" class="form-label" >Please enter your email address</label>
        <div class="p-0">
            <input type="email" id="email-reset" name="email-reset" class="form-control w-50 m-auto"
                value="{{Auth::user()->email}}">
        </div>
        <p style="margin-top:20px;font-size:14px">Please check your email for instructions to change password</p>
    </div>
    <button type="submit" class="btn btn-light px-3 font-weight-bold mt-3 mb-5" id="submitReset"
        style="width: 185px; background-color:#27bebe;color:#eee">
        Submit
    </button>
</form>

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
                $('.modal-backdrop').remove();
                $('#data-table-teacher').DataTable().ajax.reload();
            }
        })
    }

    $('#resetPasswordForm').on('submit', function (event) {
        event.preventDefault()

        const formData = new FormData();
        formData.append("email", $('#email-reset').val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': globalToken
            },
            url: "{{ route('reset-password') }}",
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
