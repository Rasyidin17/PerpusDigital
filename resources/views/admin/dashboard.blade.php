@extends('layouts.master')
@section('content')
<!--begin::Mixed Widget 2-->
<div class="card card-xxl-stretch">
    
    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Chart-->
        <div class="bg-danger" data-kt-color="danger" style="height: 200px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="title">Dashboard</h1>
                        <h3 class="welcome-text">Selamat Datang {{ Auth::user()->nickname }}!</h3>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Chart-->
        <!--begin::Stats-->
        <div class="card-p mt-n20 position-relative">
            <!--begin::Row-->
            <div class="row g-0">
                
                <!--begin::Col-->
                <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                    {{-- <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                        </svg>
                    </span> --}}
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <a href="#" class="text-warning fw-bold fs-6">Data Account</a>
                    <div class="text-warning fw-bold fs-6">
                        <h3>{{ $user }}</h3>
                      </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                    <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                            <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                    </span>
                    <!--end::Svg Icon-->
                    <a href="#" class="text-primary fw-bold fs-6">Data Buku</a>
                    <div class="text-warning fw-bold fs-6">
                        <h3>{{ $book }}</h3>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-0">
                <!--begin::Col-->
                <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M20 21H3C2.4 21 2 20.6 2 20V10C2 9.4 2.4 9 3 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z" fill="black" />
                            <path d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <a href="#" class="text-danger fw-bold fs-6 mt-2">Data Borrowing</a>
                    <div class="text-danger fw-bold fs-6 mt-2">
                        <h3>{{ $borrowing }}</h3>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col bg-light-success px-6 py-8 rounded-2">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black" />
                            <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <a href="#" class="text-success fw-bold fs-6 mt-2">Bug Reports</a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mt-8">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
            </div>
            <div class="col-sm-6 mt-8">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
          </div>
          <!-- ./col -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Selamat Datang {{ Auth::user()->nickname }} !
                </h3>

                {{-- <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="#" class="nav-link active">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#" >Tambah Siswa</a>
                    </li>
                  </ul>
                </div> --}}
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
          <section class="col-lg-5 connectedSortable">
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection