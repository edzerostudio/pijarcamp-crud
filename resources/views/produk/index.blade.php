<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <label for="my-modal" class="btn btn-outline btn-primary modal-button mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4v16m8-8H4" />
                </svg> {{ __('Tambahkan Produk') }}
            </label>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                    <td>{{ $produk->Harga }}</td>
                                    <td>{{ $produk->jumlah }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            
                            @if($produk->isEmpty())
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

    <input type="checkbox" id="my-modal" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Congratulations random Interner user!</h3>
            <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>
            <div class="modal-action">
                <button type="submit" class="btn">Submit</button>
                <label for="my-modal" class="btn">Close</label>
            </div>
        </div>
    </div>
</x-app-layout>
