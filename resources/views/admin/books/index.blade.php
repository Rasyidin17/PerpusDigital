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
                            <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Book">
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-1">
                            <!--begin::Wrapper-->
                            <div class="me-4">
                                <!--begin::Menu-->
                                <a href="{{ route('book-pdf') }}" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Cetak Laporan(PDF)</a>
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
                            <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary">Create</a>
                            <!--end::Button-->
                        </div>
                        <!--end::Actions-->
                    </div>
                </div>
                <!--end::Stats-->
                <!--start::Table-->
                <div class="table-responsive" style="overflow-x: auto; overflow-y: auto;">
                    <table class="table table-responsive table-row-dashed table-row-gray-500 gy-5 gs-5 mb-0">
                        <thead>
                            <tr class="fw-bold fs-4 text-gray-800">
                                <th scope="col">No</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Pdf</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->judul }}</td>
                                <td>{{ $book->penulis }}</td>
                                <td>{{ $book->penerbit }}</td>
                                <td>{{ $book->kategori }}</td>
                                <td>{{ $book->tahun_terbit }}</td>
                                <td>
                                    @if($book->img)
                                        <img src="{{ asset('storage/images/'.$book->img) }}" alt="{{ $book->judul }}" style="width: 70px;">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                </td>
                                <td>
                                    @if($book->pdf)
                                        <a href="{{ asset('storage/pdfs/'.$book->pdf) }}" target="_blank">Lihat PDF</a>
                                    @else
                                        <p>Tidak ada PDF</p>
                                    @endif
                                </td>
                                <td>   
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                        </a>
                        
                                        <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </a>
                       
                                            <!-- Button trigger modal -->
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin mau hapus {{ $book->judul }}?')" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                </svg>    
                                            </button>
                                        </form>
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
{!! $books->withQueryString()->links('pagination::bootstrap-5') !!}
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