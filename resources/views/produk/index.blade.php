<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <label for="modal-create" class="btn btn-outline btn-primary modal-button mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4v16m8-8H4" />
                </svg> {{ __('Tambahkan Produk') }}
            </label>
            @if (session('error'))
                <div class="alert alert-error shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Nama Produk') }}</th>
                                <th>{{ __('Keterangan') }}</th>
                                <th>{{ __('Harga') }}</th>
                                <th>{{ __('Jumlah') }}</th>
                                <th>{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $index => $produk)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->keterangan }}</td>
                                    <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->jumlah }}</td>
                                    <td>
                                        <label for="modal-view" class="btn btn-secondary btn-xs modal-button" onClick="onView({{ $produk }});">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </label>
                                        <label for="modal-update" class="btn btn-warning btn-xs modal-button" onClick="onEdit(`{{ route('produk.update', $produk->id) }}`, {{ $produk }});">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </label>
                                        <label for="modal-destroy" class="btn btn-error btn-xs modal-button" onClick="onDelete(`{{ route('produk.destroy', $produk->id) }}`);">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                                                <path strokeLinecap="round" strokeLinejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            
                            @if(empty($produk))
                                <tr>
                                    <td colspan="6" class="text-center">{{ __('Tidak ada data') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input type="checkbox" id="modal-create" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form method="POST" action="{{ route('produk.store') }}">
                @csrf
                <h3 class="font-bold text-lg">Tambahkan Produk</h3>
                <input type="text" name="nama_produk" placeholder="Nama Produk" class="input input-bordered w-full max-w-xs my-3">
                <textarea name="keterangan" class="textarea textarea-bordered my-3" placeholder="Keterangan"></textarea>
                <input type="number" name="harga" placeholder="Harga" class="input input-bordered w-full max-w-xs my-3">
                <input type="number" name="jumlah" placeholder="Jumlah" class="input input-bordered w-full max-w-xs my-3">
                <div class="modal-action">
                    <button type="submit" class="btn">Submit</button>
                    <label for="modal-create" class="btn">Close</label>
                </div>
            </form>
        </div>
    </div>

    <input type="checkbox" id="modal-view" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form id="formViewProduk">
                <h3 class="font-bold text-lg">Lihat Produk</h3>
                <input type="text" name="nama_produk" placeholder="Nama Produk" class="input input-bordered w-full max-w-xs my-3" disabled>
                <textarea name="keterangan" class="textarea textarea-bordered my-3" placeholder="Keterangan" disabled></textarea>
                <input type="number" name="harga" placeholder="Harga" class="input input-bordered w-full max-w-xs my-3" disabled>
                <input type="number" name="jumlah" placeholder="Jumlah" class="input input-bordered w-full max-w-xs my-3" disabled>
                <div class="modal-action">
                    <label for="modal-view" class="btn">Close</label>
                </div>
            </form>
        </div>
    </div>

    <input type="checkbox" id="modal-update" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form method="POST" action="" id="formEditProduk">
                @method('PUT')
                @csrf
                <h3 class="font-bold text-lg">Perbarui Produk</h3>
                <input type="text" name="nama_produk" placeholder="Nama Produk" class="input input-bordered w-full max-w-xs my-3">
                <textarea name="keterangan" class="textarea textarea-bordered my-3" placeholder="Keterangan"></textarea>
                <input type="number" name="harga" placeholder="Harga" class="input input-bordered w-full max-w-xs my-3">
                <input type="number" name="jumlah" placeholder="Jumlah" class="input input-bordered w-full max-w-xs my-3">
                <div class="modal-action">
                    <button type="submit" class="btn">Submit</button>
                    <label for="modal-update" class="btn">Close</label>
                </div>
            </form>
        </div>
    </div>

    <input type="checkbox" id="modal-destroy" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form method="POST" action="" id="formDeleteProduk">
                @method('DELETE')
                @csrf
                <h3 class="font-bold text-lg">Hapus Produk</h3>
                <p class="py-4">Anda yakin ingin menghapus produk ini?</p>
                <div class="modal-action">
                    <button type="submit" class="btn">Submit</button>
                    <label for="modal-destroy" class="btn">Close</label>
                </div>
            </form>
        </div>
    </div>
    <script>
        let onView = (data) => {
            var form = document.getElementById('formViewProduk')??null;
            if (form && data) {
                var namaProduk = form.querySelector('input[name="nama_produk"]'),
                    keterangan = form.querySelector('textarea[name="keterangan"]'),
                    harga = form.querySelector('input[name="harga"]'),
                    jumlah = form.querySelector('input[name="jumlah"]');

                namaProduk.value = data.nama_produk;
                keterangan.value = data.keterangan;
                harga.value = data.harga;
                jumlah.value = data.jumlah;
            }
        };
        let onEdit = (route, data) => {
            var form = document.getElementById('formEditProduk')??null;
            if (form) {
                form.action = route;
                if (data) {
                    var namaProduk = form.querySelector('input[name="nama_produk"]'),
                        keterangan = form.querySelector('textarea[name="keterangan"]'),
                        harga = form.querySelector('input[name="harga"]'),
                        jumlah = form.querySelector('input[name="jumlah"]');

                    namaProduk.value = data.nama_produk;
                    keterangan.value = data.keterangan;
                    harga.value = data.harga;
                    jumlah.value = data.jumlah;
                }
            }
        };
        let onDelete = (route) => {
            var form = document.getElementById('formDeleteProduk')??null;
            if (form) {
                form.action = route;
            }
        };
    </script>
</x-app-layout>
