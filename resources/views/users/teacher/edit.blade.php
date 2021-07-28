<div class="modal fade" id="editTeacherModal" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content p-3 p-md-5 border-0 shadow">
            <div class="modal-body p-0">
                <div class="container-fluid px-2">
                    <div class="row no-gutters">
                        <div class="col-12 mb-3 mt-3 mt-md-0 text-center text-md-left">
                            <h5><b>Edit Akun Dosen</b></h5>
                        </div>
                        <div class="col-12">
                            {!! Form::open(['enctype' => 'multipart/form-data',
                            'id' => 'editTeacherForm',
                            'autocomplete'=> 'off',
                            'class' => 'form-row no-gutters needs-validation',
                            ]) !!}

                            <!-- Name -->
                            <div class="form-group col-sm-12 p-0">
                                {!! Form::label('edit-name-teacher', 'Nama Dosen:') !!}
                                {!! Form::text('edit-name-teacher', null,
                                ['id' => 'edit-name-teacher',
                                'class' => 'form-control',
                                'placeholder' => 'Nama Dosen',
                                'required']) !!}
                            </div>

                            <!-- Email -->
                            <div class="form-group col-sm-12 p-0">
                                {!! Form::label('edit-email-teacher', 'Email:') !!}
                                {!! Form::email('edit-email-teacher', null,
                                ['id' => 'edit-email-teacher',
                                'class' => 'form-control',
                                'placeholder' => 'Email',
                                'required']) !!}
                            </div>

                            <!-- Password -->
                            <div class="form-group col-sm-12 p-0">
                                {!! Form::label('edit-password', 'Password:') !!}
                                <input id="edit-password-teacher" type="password" class="form-control" name="edit-password-teacher"
                                    placeholder="********">
                            </div>

                            <input id="hidden-id-teacher" type="hidden">

                            <!-- Submit Field -->
                            <div class="form-group col-sm-12 p-0 my-3 text-right">
                                <button type="submit" class="btn px-3 rounded-pill font-weight-bold mr-2 saveButton"
                                    style="width: 105px;">
                                    Simpan
                                </button>
                                <button type="button" class="btn btn-dark px-3 rounded-pill  font-weight-bold"
                                    style="width: 105px;" data-dismiss="modal">
                                    Batal
                                </button>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
