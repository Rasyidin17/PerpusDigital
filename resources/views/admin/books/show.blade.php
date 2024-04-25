@extends('layouts.master')

@section('content')
<!--begin::details View-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer my-2">
        <!--begin::Card title-->
        <div class="card-title m-0 flex-column">
            <h3 class="fw-bolder m-0">Book Details</h3>
            <div class="text-muted fs-7 fw-bold">Detail Buku</div>
        </div>
        <!--end::Card title-->
        <!--start::Button-->
        <!--start::Action-->
        <a href="{{ route('books.index') }}" class="btn btn-flex btn-light btn-light btn-active-primary fw-bolder align-self-center">
            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr002.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="black"/>
                    <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="black"/>
                </svg>
            </span>
            <!--end::Svg Icon-->Return</a>
        <!--end::Button-->
        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Judul</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $book->judul }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Penulis</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $book->penulis }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Penerbit</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $book->penerbit }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Kategori</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $book->kategori }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Sinopsis</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $book->sinopsis }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Stok</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $book->stok }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Tahun Terbit</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $book->tahun_terbit }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Gambar</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8">
                <img src="{{ asset('storage/images/'.$book->img) }}" alt="{{ $book->judul }}" style="width: 70px;">
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->
@endsection