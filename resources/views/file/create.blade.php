<h2 class="py-4">Publish Skripsi</h2>
<form>
    <div class="form-group row">
        <label for="title" name="title" class="col-md-4 col-form-label text-md-right form-label">Judul : </label>
        <div class="col-md-6 p-0">
            <input id="title" type="text" class="form-control" name="title" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="dosen" name="dosen" class="col-md-4 col-form-label text-md-right form-label">Nama Dosen : </label>
        <div class="col-md-6 p-0">
            <input id="dosen" type="text" class="form-control" name="dosen" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="keyword" name="keyword" class="col-md-4 col-form-label text-md-right form-label">Keyword : </label>
        <div class="col-md-6 p-0">
            <input id="keyword" type="text" class="form-control" name="keyword" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="date" name="date" class="col-md-4 col-form-label text-md-right form-label">Tanggal : </label>
        <div class="col-md-6 p-0">
            <input id="date" type="date" class="form-control" name="date" required >
        </div>
    </div>
    <div class="form-group row">
        <label for="file" name="file" class="col-md-4 col-form-label text-md-right form-label">File : </label>
        <div class="col-md-6 custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
            <label class="custom-file-label form-control" for="validatedCustomFile">Choose file...</label>
            {{-- <input id="file" type="file" class="form-control" name="file" required > --}}
        </div>
    </div>
    <button type="submit" class="btn btn-light px-3 font-weight-bold mt-3"
        style="width: 185px; background-color:#27bebe;color:#eee">
        Submit
    </button>
</form>
