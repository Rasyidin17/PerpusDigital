@extends('layouts.customer')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <!-- Page title content -->
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Buku Saya</h4>
                        </div>
                        <!--end col-->
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
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Book">
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-row-dashed table-row-gray-500 gy-5 gs-5 mb-0">
                                <thead>
                                    <tr class="fw-bold fs-4 text-gray-800">
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Baca Buku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrowings as $borrowing)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($borrowing->book)
                                                    {{ $borrowing->book->judul ?? 'Judul tidak tersedia' }}
                                                @else
                                                    <p>Buku dihapus</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($borrowing->book && $borrowing->book->img)
                                                    <img src="{{ asset('storage/images/' . $borrowing->book->img) }}" alt="Product Image" style="width: 70px;">
                                                @else
                                                    Buku dihapus
                                                @endif
                                            </td>
                                            <td>
                                                @if ($borrowing->status == 'pinjam')
                                                    @if ($borrowing->book && $borrowing->book->pdf)
                                                        <a href="{{ asset('storage/pdfs/' . $borrowing->book->pdf) }}" target="_blank">Baca</a>
                                                        <button class="btn btn-primary btn-sm" onclick="kembalikanBuku({{ $borrowing->id }})">Kembalikan Buku</button>
                                                    @else
                                                        -
                                                    @endif
                                                @elseif ($borrowing->status == 'Telat Mengembalikan')
                                                    <span class="text-danger">Telat Mengembalikan</span>
                                                @else
                                                    <span class="text-success">Sudah Dikembalikan</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="noResultsMessage" style="display: none;">
                                Data tidak ditemukan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function kembalikanBuku(borrowingId) {
        axios.delete('/borrowings/' + borrowingId)
            .then(function (response) {
                // Menampilkan alert berhasil
                Swal.fire({
                    title: 'Berhasil',
                    text: response.data.success,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.reload(); // Memuat ulang halaman setelah alert ditutup
                });
            })
            .catch(function (error) {
                // Menampilkan alert berhasil bahkan jika terjadi kesalahan
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Buku berhasil dikembalikan.',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.reload(); // Memuat ulang halaman setelah alert ditutup
                });
            });
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil input pencarian
        const searchInput = document.querySelector('[data-kt-docs-table-filter="search"]');
        
        // Ambil semua baris tabel
        const rows = document.querySelectorAll('tbody tr');

        // Tambahkan event listener untuk input pencarian
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase().trim();

            // Iterasi setiap baris tabel
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let found = false;

                // Iterasi setiap sel dalam baris
                cells.forEach(cell => {
                    // Periksa apakah nilai sel cocok dengan kata kunci pencarian
                    if (cell.textContent.toLowerCase().includes(searchTerm)) {
                        found = true;
                    }
                });

                // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
    // Ambil input pencarian
    const searchInput = document.querySelector('[data-kt-docs-table-filter="search"]');
    
    // Ambil semua baris tabel
    const rows = document.querySelectorAll('tbody tr');
    
    // Ambil pesan "Data tidak ditemukan"
    const noResultsMessage = document.getElementById('noResultsMessage');

    // Tambahkan event listener untuk input pencarian
    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let found = false;

        // Iterasi setiap baris tabel
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let rowMatch = false;

            // Iterasi setiap sel dalam baris
            cells.forEach(cell => {
                // Periksa apakah nilai sel cocok dengan kata kunci pencarian
                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    rowMatch = true;
                    found = true;
                }
            });

            // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
            if (rowMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Tampilkan atau sembunyikan pesan "Data tidak ditemukan"
        if (found) {
            noResultsMessage.style.display = 'none';
        } else {
            noResultsMessage.style.display = 'block';
        }
    });
});
</script>


@endpush
