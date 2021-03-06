<h2 class="py-4">Publish Skripsi</h2>
@if (session()->has('message'))
    <div style="margin-top:20px" class="alert alert-success px-4">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('message') !!}
        </strong>
    </div>
@endif
<form action="{{route('upload.file')}}" method="POST"  enctype="multipart/form-data" id="uploadEssayForm">
    @csrf {{method_field('POST')}}
    <div class="form-group row">
        <label for="title" name="title" class="col-md-4 col-form-label text-md-right form-label">Judul : </label>
        <div class="col-md-6 p-0">
            <input id="title" type="text" class="form-control" name="title" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="lecturer" name="lecturer" class="col-md-4 col-form-label text-md-right form-label">Nama Dosen : </label>
        <div class="col-md-6 p-0">
            <input id="lecturer" type="text" class="form-control" name="lecturer" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="abstract_id" name="abstract_id" class="col-md-4 col-form-label text-md-right form-label">Abstrak ( ID ) : </label>
        <div class="col-md-6 p-0">
            <textarea id="abstract_id" type="text" class="form-control" name="abstract_id" required rows="5"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="abstract_en" name="abstract_en" class="col-md-4 col-form-label text-md-right form-label">Abstrak ( EN ) : </label>
        <div class="col-md-6 p-0">
            <textarea id="abstract_en" type="text" class="form-control" name="abstract_en" required rows="5"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="keywords" name="keywords" class="col-md-4 col-form-label text-md-right form-label">Keyword : </label>
        <div class="col-md-6 p-0">
            <input id="keywords" type="text" class="form-control" name="keywords" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="date" name="date" class="col-md-4 col-form-label text-md-right form-label">Tanggal : </label>
        <div class="col-md-6 p-0">
            <input id="date" type="date" class="form-control" name="date" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="file" name="file" class="col-md-4 col-form-label text-md-right form-label">File Skripsi : </label>
        <div class="col-md-6 custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="file" accept=".pdf" required>
            <label class="text-left custom-file-label form-control s-file__name" for="validatedCustomFile" style="max-width: 100%">Choose file...</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="journal" name="journal" class="col-md-4 col-form-label text-md-right form-label">File Jurnal : </label>
        <div class="col-md-6 custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomJournal" name="journal" accept=".pdf" required>
            <label class="text-left custom-file-label form-control s-file__journal" for="validatedCustomJournal" style="max-width: 100%">Choose file...</label>
        </div>
    </div>
    <input type="hidden" id="essay-id" name="id">
    <button type="submit" class="btn btn-light px-3 font-weight-bold mt-3 mb-5"
        style="width: 185px; background-color:#27bebe;color:#eee">
        Submit
    </button>
</form>
@push('scripts')
<script>
    let res = {!!json_encode($file) !!}

    function loadFile() {
        if(res) {
            let fileName =  res.file.substring(res.file.indexOf('-') + 1);
            let fileChar = fileName.length > 20 ? fileName.substring(0, 20) + '...' : fileName
            let journalName =  res.journal ? res.journal.substring(res.journal.indexOf('-') + 1) : '';
            let journalChar = journalName.length > 20 ? journalName.substring(0, 20) + '...' : journalName
            $('#title').val(res.title)
            $('#lecturer').val(res.lecturer)
            $('#abstract_id').val(res.abstract_id)
            $('#abstract_en').val(res.abstract_en)
            $('#keywords').val(res.keywords)
            $('#date').val(res.date)
            $('#essay-id').val(res.id)
            $('.s-file__name').text(fileChar);
            $('.s-file__journal').text(journalChar);
            $('#validatedCustomFile').removeAttr('required')
            $('#validatedCustomJournal').removeAttr('required')
        }
    }

    $(document).on('change', '#validatedCustomFile', function (e) {
        $('.s-file__name').text(this.files[0].name);
    });

    $(document).on('change', '#validatedCustomJournal', function (e) {
        $('.s-file__journal').text(this.files[0].name);
    });

    $('#uploadEssayForm').on('submit', function (event) {
        event.preventDefault()

        let file = $('input[name=file]')[0].files[0]
        if(file.size > 15000000) {
            alert('Ukuran file skripsi melebihi 15 MB')
            return
        }

        let journal = $('input[name=journal]')[0].files[0]
        if(journal.size > 15000000) {
            alert('Ukuran file jurnal melebihi 15 MB')
            return
        }

        event.currentTarget.submit()
    });

    loadFile()
</script>

@endpush
