@extends('layouts/contentLayoutMaster')

@section('title', 'Input Data Disposisi')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
@endsection

@section('content')
<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form Lembar Disposisi</h4>
        </div>
        <div class="card-body">
          <form action="/disposisi/{{$disposisi->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  
                   <label class="form-label" for="basic">Nomor Dokumen</label>
                    <select name="nomor_surat" class="select2 form-select" id="basic">
                        <option value="">Pilih Dokumen</option>
                        @foreach($suratkeluar as $s)
                        <option value="{{$s->nomor_surat}}" @if($disposisi->nomor_surat == $s->nomor_surat)selected @endif>{{$s->nomor_surat}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <!-- <label class="form-label" for="tanggal-column">Tanggal</label> -->
                  <label class="form-label" for="fp-default">Tanggal</label>
                    <input value="{{$disposisi->tanggal_terima}}" type="text" name="tanggal_terima" id="fp-default" class="form-control flatpickr-basic" placeholder="Tahun-Bulan-Hari" />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                <label class="form-label" for="select2-multiple">Tujuan</label>
                  <select name="tujuan" class="select2 form-select" id="select2-multiple" multiple>
                        @foreach($tujuan as $t)
                        <option value="{{$t->tujuan}}" @if($disposisi->tujuan == $t->tujuan) selected @endif>{{$t->tujuan}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                <label class="form-label" for="select2-basic">Tindak Lanjut</label>
                    <select name="tindak_lanjut" class="select2 form-select" id="select2-basic">
                        <option value="">Pilih Tindakan</option>
                        <option value="Diketahui">Diketahui</option>
                        <option value="pendapat">Pendapat</option>
                        <option value="segera">Segera Dijawab/Diselesaikan</option>
                        <option value="lanjut">Dibicarakan lebih lanjut</option>
                        <option value="penjelasan">Butuh Penjelasan</option>
                        <option value="diteliti">Diteliti/Diperiksa</option>
                        <option value="dilaksanakan">Dilaksanakan</option>
                        <option value="disimpan">Disimpan</option>
                    </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1 mt-2">
                    <div class="form-floating">
                        <textarea
                        class="form-control"
                        name="keterangan"
                        placeholder="Tulis Keterangan Disini"
                        id="floatingTextarea2"
                        style="height: 100px"
                        >{{$disposisi->keterangan}}</textarea>
                    <label for="floatingTextarea2">Keterangan</label>
                    </div>
                </div>
              </div>
              <!-- UPLOAD FILE -->
              <div class="col-md-6 col-12">
                <div class="mb-1 mt-2">
                <input
                    type="file"
                    id="perihal-column"
                    class="form-control"
                    name="dokumen"
                    value="{{$disposisi->dokumen}}"
                  /> 
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1">Update</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection


@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>
  <script>
   $(document).ready(function () {
         $(".select2-multiple").select2({
         });
   });
</script>
@endsection
