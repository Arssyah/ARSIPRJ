@extends('layouts/contentLayoutMaster')


@section('vendor-style')
{{-- vendor css files TABLE--}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
{{-- Vendor Css files INPUT --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">

<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('title', 'Catatan Ekspedisi')

@section('content')
<section id="complex-header-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        @php
                            $jenis="Ekspedisi Internal";
                        @endphp
                        <button class="btn btn-outline-success round waves-effect btn-sm" type="button" onclick="window.location.href='/ekspedisi/create/{{$jenis}}'">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                               Tabel Ekspedisi Internal
                            </span>
                        </button>
                    </div>
                </div>

                <div class="card-datatable" style="font-size: smaller ; margin: 5px;">
                    <table id="ekspedisiIn" class="dt-multilingual table">
                        <thead>
                            <tr> 
                                <th>Tanggal Kirim</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Nama Penerima</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($ekspedisiIn as $e)
                          <tr>
                            <td>{{$e->tanggal_kirim}}</td>
                            <td>{{$e->nomor_surat}}</td>
                            <td>{{$e->tanggal_surat}}</td>
                            <td>{{$e->perihal}}</td>
                            <td>{{$e->nama_penerima}}</td>
                            <td>
                                <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                                <div class="demo-inline-spacing mb-2">
                                    <button onclick="window.location.href='/ekspedisi/{{$e->id}}/edit'" type="button" class="btn btn-primary btn-sm">
                                            Edit</a></button>
                                    <form action="/ekspedisi/{{$e->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-primary btn-sm" type="submit" value="Delete">Delete
                                    </button>
                                    </form>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="complex-header-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom p-1">
                    <div class="head-label">
                        @php
                            $jenis="Ekspedisi Eksternal";
                        @endphp
                        <button class="btn btn-outline-success round waves-effect btn-sm" type="button" onclick="window.location.href='/ekspedisi/create/{{$jenis}}'">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                               Tabel Ekspedisi Eksternal
                            </span>
                        </button>
                    </div>
                </div>

                <div class="card-datatable" style="font-size: smaller ; margin: 5px;">
                    <table id="ekspedisiEks" class="dt-multilingual table">
                        <thead>
                            <tr> 
                                <th>Tanggal Kirim</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Nama Penerima</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($ekspedisiEks as $e)
                          <tr>
                            <td>{{$e->tanggal_kirim}}</td>
                            <td>{{$e->nomor_surat}}</td>
                            <td>{{$e->tanggal_surat}}</td>
                            <td>{{$e->perihal}}</td>
                            <td>{{$e->nama_penerima}}</td>
                            <td>
                                <!-- <div class="btn-group" role="group" aria-label="Basic example"> -->
                                <div class="demo-inline-spacing mb-2">
                                    <button onclick="window.location.href='/ekspedisi/{{$e->id}}/edit'" type="button" class="btn btn-primary btn-sm">
                                            Edit</a></button>
                                    <form action="/ekspedisi/{{$e->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-primary btn-sm" type="submit" value="Delete">Delete
                                    </button>
                                    </form>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



@section('vendor-script')
{{-- vendor files TABLE--}}
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

<!-- vendor files INPUT-->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>

@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
  <script>
    $(document).ready(function() {

        $(".basic-select2").select2();
        $('#ekspedisiEks').DataTable();
        $('#ekspedisiIn').DataTable();
    });
</script>
@endsection

