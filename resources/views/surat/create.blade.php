@extends('layouts/contentLayoutMaster')

@section('title', 'Input Data')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
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
          <h4 class="card-title">Data Inputan {{$jenis_surat}}</h4>
        </div>
        <!-- <h1>{{$surat}}</h1> -->
        <div class="card-body">
          <form action="/surat/store" method="POST" class="form">
            @csrf
            <input type="hidden" id="jenis_surat" value="{{$jenis_surat}}">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="nomor-dokumen-column">Nomor Dokumen</label>
                  <input
                    type="text"
                    id="nomor-dokumen-column"
                    class="form-control"
                    placeholder="Masukkan Nomor dokumen"
                    name="nomor_surat"
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="select2-basic">Nama Dokumen</label>
                    <select name="dokumen_id" class="select2 form-select" id="select2-basic">
                        <option value="">Pilih Dokumen</option>
                        @if($jenis_surat == "Surat Penting")
                          @foreach($dokumenPenting as $d)
                            <option value="{{$d->id}}">{{$d->nama_dokumen}}</option>
                          @endforeach
                        @else
                          @foreach($dokumenUmum as $d)
                            <option value="{{$d->id}}">{{$d->nama_dokumen}}</option>
                          @endforeach
                        @endif
                    </select>
                </div>
              </div>
               <!-- JENIS SURAT -->
              
              <div class="col-md-6 col-12">
                <div class="mb-1">
                  <!-- <label class="form-label" for="tanggal-column">Tanggal</label> -->
                  <label class="form-label" for="fp-default">Tanggal</label>
                    <input type="text" name="tanggal" id="fp-default" class="form-control flatpickr-basic" placeholder="Tahun-Bulan-Hari" />
                </div>
              </div>
              <div id="dari" class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="dari-column">Dari</label>
                  <input
                    type="text"
                    id="dari-column"
                    class="form-control"
                    name="dari"
                    placeholder="Tulis Disini"
                  />
                </div>
              </div>
              <div id="tujuan" class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="tujuan-column">Tujuan Surat</label>
                  <input
                    type="text"
                    id="tujuan-column"
                    class="form-control"
                    name="tujuan_surat"
                    placeholder="Tulis Disini"
                  />
                </div>
              </div>
              <div id="sifat" class="col-md-6 col-12">
                <div class="mb-1">
                <label class="form-label" for="select-basic">Sifat</label>
                    <select name="sifat" class="form-select" id="select2-basic">
                        <option value="">Sifat Dokumen</option>
                        <option value="P">Penting</option>
                        <option value="B">Biasa</option>
                    </select>
                </div>
              </div>
 
              <!-- JENIS SURAT -->
              @php
              if($jenis_surat == "Surat Masuk"||$jenis_surat == "Surat Penting"){
                $jenis_surat = "M";
              }else
              {
                $jenis_surat = "K";
              }
              @endphp
                <input type="hidden" name="jenis_surat" value="{{$jenis_surat}}">

              <div id="perihal" class="col-md-6 col-12">
                <div class="mb-1">
                  <label class="form-label" for="perihal-column">Perihal</label>
                  <input
                    type="text"
                    id="perihal-column"
                    class="form-control"
                    name="perihal"
                    placeholder="Tulis Disini"
                  />
                </div>
              </div>

              <!-- UPLOAD FILE -->
              <div class="col-md-6 col-12">
                <div class="mb-1 mt-2">
                    <button id="select-files" class="btn btn-outline-primary mb-1">
                        <i data-feather="file"></i> Upload File Dokumen
                    </button>
                </div>
              </div>

              <!-- KETERANGAN -->
              <div class="col-md-6 col-12">
                <div class="mb-1">
                    <div class="form-floating">
                        <textarea
                        class="form-control"
                        name="keterangan"
                        placeholder="Tulis Keterangan Disini"
                        id="floatingTextarea2"
                        style="height: 100px"
                        ></textarea>
                    <label for="floatingTextarea2">Keterangan</label>
                    </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-1">Submit</button>
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
    $(document).ready(function() {

      var jenis_surat = document.getElementById("jenis_surat").value;
      console.log(jenis_surat);
      if (jenis_surat == "Surat Penting") {
        document.getElementById("dari").hidden=true;
        document.getElementById("perihal").hidden=true;
        document.getElementById("tujuan").hidden=true;
        document.getElementById("sifat").hidden=true;
      }
    });
  </script>
@endsection
