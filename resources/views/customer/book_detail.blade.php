@extends('layouts.customer')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <br>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row">
                            <div class="col-lg-5 w-50">
                                <div class="product-slider-single normal-slider">
                                    <img src="{{ asset('storage/images/' . $book->img) }}" alt="Product Image" class="w-100 h=100">
                                </div>
                            </div>
                            <div class="col-lg-5 mb-5">
                                <div class="product-content">
                                    <div class="title mt-20 pt-20">
                                        <h2>Judul: {{ $book->judul }}</h2>
                                    </div>
                                    <div class="ratting">
                                        <!-- Rating stars here -->
                                        <h2>Penulis: {{ $book->penulis }}</h2>
                                    </div>
                                    {{-- <div class="price mt-3">
                                        <h4>Price: {{ $book->stok }}</h4>
                                    </div> --}}
                                    <div class="detail">
                                        <h2>Sinopsis</h2>
                                        <div class="text-dark text-muted fs-6 fw-bold mt-1">{{ $book->sinopsis }}</div>
                                    </div>
                                    <!-- Action button for "Baca Sekarang" -->
                                    <div class="action" id="baca-sekarang-button">
                                        <!-- Tautan untuk membaca buku -->
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-3" onclick="pinjamBuku({{ $book->id }})">Pinjam Sekarang!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <!-- Navigation pills here -->
                                </ul>
                                <div class="tab-content">
                                    <!-- Tab content here -->
                                </div>
                                {{-- <h4>Komentar Teratas</h4> --}}
                                <div class="row">
                                    <!-- Top comments here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <!-- Sidebar content here -->
                    <div class="sidebar-widget category">
                        <h2 class="title text-center">Perlu Diingat</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                                </li> --}}
                                {{-- @foreach ($kategori as $kategori) --}}
                                <h2>Jika Meminjam Buku Lebih Dari 7 Hari Maka User Akan Didenda <span class="text-bold">Rp.1000</span></h2>
                                {{-- @endforeach --}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->
    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection

@push('scripts')
<script>
    function pinjamBuku(bookId) {
        // Kirim permintaan AJAX ke server
        axios.post('{{ route('borrowings.store') }}', {
            book_id: bookId
        })
        .then(function (response) {
            // Tanggapan sukses dari server
            Swal.fire({
                title: 'Berhasil',
                html: 'Buku berhasil dipinjam.<br>Silahkan pergi ke halaman My Book untuk membaca buku.',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        })
        .catch(function (error) {
            // Tanggapan error dari server
            if (error.response && error.response.status === 422) {
                // Menampilkan pesan error dari server jika terjadi kesalahan validasi
                Swal.fire({
                    title: 'Error',
                    text: error.response.data.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            } else {
                // Menampilkan pesan error umum jika terjadi kesalahan selain dari validasi
                Swal.fire({
                    title: 'Error',
                    text: 'Terjadi kesalahan saat memproses permintaan.',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }
        });
    }
</script>
@endpush
