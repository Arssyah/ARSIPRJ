@extends('layouts/contentLayoutMaster')

@section('title', 'Beranda')

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Selamat Datang di Aplikasi Arsip Dokumen Raudlatul Jannah 🚀</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
    <p>
       Aplikasi ini digunakan oleh Tata Usaha setiap institusi yang berada dibawah naungan Perguruan Islam Raudlatul Jannah
       untuk mengelola arsip dokumen surat yang sudah selesai dan siap untuk disimpan.
      </p>
      <ul>
        <li>
          Tabel surat yang sudah disesuaikan dengan baik sesuai dengan tabel sebenarnya dari administrasi Raudlatul Jannah
        </li>
        <li>
          Fitur pencatatan ekspedisi sudah disesuaikan dengan baik sehingga tata usaha sudah bisa beralih ke aplikasi daripada menggunakan
          buku sebagai informasi data.
        </li>
      </ul>
    </div>
  </div>
</div>
<!--/ Kick start -->

<!-- Page layout -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Apa Saja Tabel dan Pencatatan yang Dibuat ?</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <ul>
        <li> Tabel Daftar Surat, Daftar Dokumen Penting, Daftar Berita Acara, Daftar Lembar disposisi, Daftar Arsip</li>
        <li>
          Ekspedisi umum Internal dan Eksternal
        </li>
      </ul>
      <div class="alert alert-primary" role="alert">
        <div class="alert-body">
          <strong>Note : </strong>Diusahakan untuk mencatat dengan teliti dan dicek kembali</a
          >&nbsp; agar tidak terjadi hal yang tidak diinginkan
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Page layout -->
@endsection
