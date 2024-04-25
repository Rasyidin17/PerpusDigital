@extends('layouts.master')

@section('content')
    <!--begin::Col-->
    <div class="col-xxl-12">
        <!--begin::Widget-->
        <div class="card card-xxl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <!--begin::Stats-->
                <div class="flex-grow-1 card-p pb-0">
                    <div class="d-flex flex-stack flex-wrap">
                        <div class="me-2">
                            <a class="text-dark text-hover-primary fw-bolder fs-3">Data Table</a>
                            <div class="text-muted fs-7 fw-bold">Tabel Data</div>
                        </div>
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Borrowing">
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-1">
                            <!--begin::Wrapper-->
                            <div class="me-4">
                                <!--begin::Menu-->
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484bf44d957">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bolder d-inline">Filter Options</div>
                                        <span class="text-center text-muted text-uppercase fw-bolder"> / </span>
                                        <div class="text-muted fs-6 fw-bold d-inline">Opsi Filter</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Menu separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Form-->
                                    <div class="px-7 py-5">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label fw-bold">Aktif:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div>
                                                <select data-column="8" class="filter-select form-select form-select-solid" data-control="select2">
                                                    <option value="">Semua</option>
                                                    <option value="Y">Ya</option>
                                                    <option value="N">Tidak</option>
                                                </select>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Form-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Menu-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Button-->
                            <a href="{{ route('export-pdf') }}" class="btn btn-sm btn-primary">Cetak Laporan(PDF)</a>
                            <!--end::Button-->
                        </div>
                        <!--end::Actions-->
                    </div>
                </div>
                <!--end::Stats-->
                <!--start::Table-->
                <div class="table-responsive">
                    <table class="table table-responsive table-row-dashed table-row-gray-500 gy-5 gs-5 mb-0">
                        <thead>
                            <tr class="fw-bold fs-4 text-gray-800">
                                <th scope="col">No</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Buku Yang Dipinjam</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Status</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Pdf</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowings as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    @if($item->user)
                                        {{ $item->user->nickname }}
                                    @else
                                        User tidak ditemukan
                                    @endif
                                </td>
                                @if($item->book)
                                    <td>{{ $item->book->judul }}</td>
                                @else
                                    <td>Buku tidak ditemukan</td>
                                @endif
                                <td>{{ $item->pinjam }}</td>
                                <td>{{ $item->kembali }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if($item->book && $item->book->img)
                                        <img src="{{ asset('storage/images/'.$item->book->img) }}" alt="{{ $item->judul }}" style="width: 70px;">
                                    @else
                                        <p>Gambar tidak tersedia</p>
                                    @endif
                                </td>                                
                                <td>
                                    @if($item->book && $item->book->pdf)
                                        <a href="{{ asset('storage/pdfs/'.$item->book->pdf) }}" target="_blank">Lihat PDF</a>
                                    @else
                                        <p>PDF tidak tersedia</p>
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
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Widget-->
    </div>
    <!--end::Col-->
@include('sweetalert::alert')
{!! $borrowings->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection

@push('scripts')
    <script>
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