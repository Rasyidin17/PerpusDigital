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
                <h3 class="fw-bolder m-0">Create Account</h3>
                <div class="text-muted fs-7 fw-bold">Membuat Data Tambahan</div>
            </div>
            <!--end::Card title-->
            <!--start::Button-->
            <!--start::Action-->
            <a href="{{ route('users.index') }}" class="btn btn-flex btn-light btn-light btn-active-primary fw-bolder align-self-center">
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
        <form class="form" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                        <span class="required">Nama Panggilan</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('nickname')is-invalid @enderror" type="text" id="name" name="nickname" value="{{ old('nickname') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('nickname')
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
                        <span class="required">Nama Lengkap</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('full_name')is-invalid @enderror" type="text" id="price" name="full_name" value="{{ old('full_name') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('full_name')
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
                        <span class="required">Nomor Telephone</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control form-control-solid @error('no_tlp')is-invalid @enderror" type="text" pattern="\d*" id="price" name="no_tlp" value="{{ old('no_tlp') }}" />
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('no_tlp')
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
                        <span class="required">Jenis Kelamin</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="form-group">
                        <input type="radio" name="jk" id="p" value="Perempuan">
                        <label for="p">Perempuan</label>
                        <input type="radio" name="jk" id="l" value="Laki-laki">
                        <label for="l">Laki-laki</label>
                    </div>
                    <!--end::Input-->
                    <!--begin::Error-->
                    @error('jk')
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