@extends('layouts/contentLayoutMaster')

@section('title', 'Daftar Catatan Arsip')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
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


@section('content')
<section id="complex-header-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title">Rekap Catatan Arsip</h4>
              <div class="head-label">
              <div class="col-12">
                <button class="btn btn-outline-success round waves-effect btn-sm" type="button" onclick="window.location.href='/arsip/create'">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                          <line x1="12" y1="5" x2="12" y2="19"></line>
                          <line x1="5" y1="12" x2="19" y2="12"></line>
                      </svg>
                          Input Data
                    </span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-datatable">
          <table class="dt-responsive table" style="font-size:small ;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Klasifikasi</th>
                <th>Kode Arsip</th>
                <th>Tanggal Mulai Arsip</th>
                <th>Lokasi Penyimpanan</th>
                <th>Masa Penyimpanan</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tfoot>
              @foreach($arsip as $e)
              <tr>
                <td>{{$e->id}}</td>
                <td>{{$e->klasifikasi}}</td>
                <td>{{$e->kode_arsip}}</td>
                <td>{{$e->tanggal_arsip}}</td>
                <td>{{$e->lokasi}}</td>
                <td>{{$e->masa}}</td>
                <a href="/surat/{{$s->id}}/edit">Edit</a>
                  <form action="/surat/{{$s->id}}" method="POST">
                      @csrf
                      @method('delete')
                      <input type="submit" value="Delete">
                  </form>
              </td>
              </tr>
              @endforeach
              </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
@endsection
