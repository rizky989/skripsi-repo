@push('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/datatables.min.css') }}" />
<style>
    #loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #27bebe;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 100ms linear infinite;
        animation: spin 100ms linear infinite;
        margin: 0 auto;
    }

    .dataTables_processing {
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        margin-left: 0 !important;
        margin-top: 0 !important;
        height: 100%;
        z-index: 1;
        background: rgba(255, 255, 255, .75);
    }

</style>
@endpush
<div class="col-md-12 px-3 pt-5 py-3 d-flex justify-content-between">
    <div class="col-md-8 col-sm-8 mb-2 px-0 text-left">
        <button type="button" class="btn" style="background-color:#27bebe; color: #FFF"
            data-toggle="modal" data-target="#addTeacherModal">Add New User</button>
    </div>
    <div class="col-md-4 col-sm-4 px-0 mb-2">
        <input type="text" id="search" name="search" class="form-control dash-search"
            placeholder="Search">
    </div>
</div>
<div class="col-md-12 mb-5 px-0 rounded overflow-hidden">
    <div class="px-3">
        <table class="table table-hover mb-3 mt-0 w-100" id="data-table-teacher">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" width="35%">Nama User</th>
                    <th class="text-center" width="35%">Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')
@include('users.teacher.create')
@include('users.teacher.edit')
@include('users.teacher.delete')

<script>
    $(document).ready(function () {

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

        let dataTable = $('#data-table-teacher').DataTable({
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
                url: "{{ route('teacher.index') }}",
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
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'action',
                    className: "text-center",
                    searchable: false,
                    orderable: false
                }
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: `<'row'<'col-sm-12 d-none'lfB>>
                <'row no-gutters'<'col-sm-12 rounded overflow-auto'rt>>
                    <'row pageInfo'>
                        <'row dataTable__footer'<'col-7 text-left'i>
                            <'col pl-0 'p>>`,
        });

        $('#search').on('keyup', function (e) {
            dataTable.search(e.target.value).draw();
        });

        $('#addTeacherModal').on('hidden.bs.modal', function (e) {
            $('#addTeacherForm').trigger('reset');
            if ($('#addTeacherForm').hasClass('was-validated')) {
                $('#addTeacherForm').removeClass('was-validated');
            }
        });

        $('#addTeacherModal').on('submit', function (event) {
            event.preventDefault()

            const formData = new FormData();
            formData.append("name", $('#name-teacher').val());
            formData.append("email", $('#email-teacher').val());
            formData.append("password", $('#password-teacher').val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': globalToken
                },
                url: "{{ route('teacher.store') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $('.saveButton').html(
                        '<span class="spinner-border spinner-border-sm" role="status"></span>'
                    )
                    $('.saveButton').attr('disabled', 'disabled')
                },
                success: function (data) {
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
                    $('#addTeacherModal').modal('hide')
                    $('.saveButton').removeAttr('disabled')
                    $('.saveButton').html('Simpan')
                }
            });
        });

        $(document).on('click', '.edit-teacher', function () {
            let res = $(this).data('resource');
            $('#edit-name-teacher').val(res.name)
            $('#edit-email-teacher').val(res.email)
            $('#hidden-id-teacher').val(res.id)

            $('#editTeacherModal').modal('show');
        });

        $('#editTeacherModal').on('submit', function (event) {
            event.preventDefault()

            let id = $('#hidden-id-teacher').val()

            const formData = new FormData();
            formData.append("name", $('#edit-name-teacher').val());
            formData.append("email", $('#edit-email-teacher').val());
            if($('#edit-password-teacher').val()) {
                formData.append("password", $('#edit-password-teacher').val());
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': globalToken
                },
                url: "/teacher/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $('.saveButton').html(
                        '<span class="spinner-border spinner-border-sm" role="status"></span>'
                    )
                    $('.saveButton').attr('disabled', 'disabled')
                },
                success: function (data) {
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
                    $('#editTeacherModal').modal('hide')
                    $('.saveButton').removeAttr('disabled')
                    $('.saveButton').html('Simpan')
                }
            });
        });


        $(document).on('click', '.delete-teacher', function (e) {
            e.stopPropagation();
            let id = $(this).data('id');
            $('input[name=delete-teacher-id]').val(id);
            $('#deleteTeacherModal').modal('show');
        });

        $('#deleteTeacherButton').on('click', function (event) {
            event.preventDefault();
            let id = $('input[name=delete-teacher-id]').val();
            if (!id) return alert("Terjadi kesalahan, harap muat ulang browser anda!");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': globalToken
                },
                type: "DELETE",
                cache: false,
                url: "{{url('/teacher')}}" + '/' + id,
                beforeSend: function () {
                    $('#deleteTeacherButton').html(
                        '<span class="spinner-border spinner-border-sm" role="status"></span>'
                    );
                    $('#deleteTeacherButton').attr('disabled', 'disabled');
                },
                success: function (data) {
                    drawAlert('fa-check-circle', 'text-success', data.message);
                },
                error: function (data) {
                    console.log('err', data)
                    drawAlert('fa-times-circle', 'text-danger',
                        'Terjadi kesalahan, harap muat ulang browser anda');
                },
                complete: function () {
                    $('#deleteTeacherModal').modal('hide');
                    $('#deleteTeacherButton').removeAttr('disabled');
                    $('#deleteTeacherButton').html('<i class="fa fa-trash fa-lg mr-2"></i> Hapus');
                }
            })
        });

    });

</script>
@endpush
