@extends('layouts.customer')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col align-self-center">
                        <div class="container-fluid">
                            <h4 class="page-title pb-md-0">Buku</h4>
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                            <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                            <span class="" id="Select_date">
                                @php
                                    echo date('d M');
                                @endphp
                            </span>
                            <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="col-md-14">
                                        <div class="product-search">
                                            <form action="{{ route('bks.index') }}" method="GET">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Cari Buku"
                                                        aria-label="Recipient's username" aria-describedby="button-addon2"
                                                        name="query">
                                                    <button class="btn btn-de-warning" type="submit" id="button-addon2">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($books->isEmpty())
                            <div class="col-md-12">
                                <p>Tidak ada hasil pencarian.</p>
                                <a href="{{ route('bks.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        @else
                            @foreach($books as $book)
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="product-item">
                                            <div class="product-title">
                                                
                                            </div>
                                            <div class="product-image">
                                                <img src="{{ asset('storage/images/' . $book->img) }}" style="max-width: 100%; height: auto; object-fit: cover;" alt="Product Image">
                                            </div>
                                            <div class="product-details">
                                                <div class="text-center">
                                                    <h3 class="text-center">{{ $book->judul }}</h3>
                                                </div>
                                                <div class="buy-now-btn mt-3 text-center">
                                                    <a class="btn btn-primary" href="{{ route('details.show', $book->id) }}">
                                                        <i class="bi bi-eye-fill"></i>Lihat Buku
                                                    </a>
                                                </div>
                                            </div>
                                        </div>Pbook
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

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
            </div>
        </div>
    </div>
    <!-- Product List End -->
@endsection
