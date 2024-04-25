@extends('layouts.master')

@section('content')
<!--start::Col-->
<div class="col-xxl-12">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title m-0 flex-column">
                <h3 class="fw-bolder m-0">Create Book</h3>
                <div class="text-muted fs-7 fw-bold">Membuat Data Tambahan</div>
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
        <!--end::Card header-->
        <!--begin::Form-->
        <form class="form" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Judul</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('judul')is-invalid @enderror" type="text" id="name" name="judul" value="{{ old('judul') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('judul')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Penulis</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('penulis')is-invalid @enderror" type="text" id="price" name="penulis" value="{{ old('penulis') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('penulis')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Penerbit</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('penerbit')is-invalid @enderror" type="text" id="price" name="penerbit" value="{{ old('penerbit') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('penerbit')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Kategori</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input class="form-control form-control form-control-solid @error('kategori')is-invalid @enderror" type="text" id="price" name="kategori" value="{{ old('kategori') }}" /> --}}
                    <select name="kategori" id="kategori" class="form-control form-control-solid @error('kategori')is-invalid @enderror">
                        <option value="">
                            @foreach ($category as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </option>
                    </select>
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('kategori')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Tahun Terbit</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('tahun_terbit')is-invalid @enderror" id="kt_datepicker_7" name="tahun_terbit" value="{{ old('tahun_terbit') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('tahun_terbit')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Sinopsis</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea class="form-control form-control form-control-solid @error('sinopsis')is-invalid @enderror" name="sinopsis" value="{{ old('sinopsis') }}"></textarea>
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('sinopsis')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Gambar</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    {{-- <input class="form-control form-control form-control-solid @error('img')is-invalid @enderror" type="file" id="price" name="img" value="{{ old('img') }}" /> --}}
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('img')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--begin::Image input-->
                <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url({{ asset('source/html/theme/demo1/dist/assets/media/avatars/blank.png') }})">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper w-125px h-125px"></div>
                    <!--end::Image preview wrapper-->

                    <!--begin::Edit button-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="change"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>

                        <!--begin::Inputs-->
                        {{-- <input type="file" name="avatar" accept=".png, .jpg, .jpeg" /> --}}
                        <input class="@error('img')is-invalid @enderror" type="file" id="price" name="img" accept=".png, .jpg, .jpeg" value="{{ old('img') }}" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Edit button-->

                    <!--begin::Cancel button-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="cancel"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel button-->

                    <!--begin::Remove button-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="remove"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove button-->
                </div>
<!--end::Image input-->
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Pdf</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('pdf')is-invalid @enderror" type="file" id="price" name="pdf" value="{{ old('pdf') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('pdf')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!--end::Error-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <!--end::Card footer-->
        </form>
        <!--end:Form-->
    </div>
    <!--end::Card-->
</div>
<!--end::Col-->
@endsection

@push('scripts')
    <script>
        $("#kt_datepicker_7").flatpickr({
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
    </script>
@endpush