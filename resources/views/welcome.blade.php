<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sinar Sintang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-950 to-blue-900 min-h-screen py-10 px-4">
    <div class="max-w-6xl mx-auto bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl p-8 border border-white/20">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 pb-4 border-b border-gray-200 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-indigo-950 tracking-tight">Toko Sinar Sintang</h1>
                <p class="text-sm text-gray-500 mt-1">Sistem Manajemen Inventaris Produk Modern</p>
            </div>
            <a href="/produk/create" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg shadow-indigo-500/30 transition transform hover:-translate-y-0.5">
                + Tambah Produk
            </a>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto rounded-xl border border-gray-100 shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-indigo-900 text-white text-sm uppercase tracking-wider">
                        <th class="py-4 px-6 font-semibold">Foto</th>
                        <th class="py-4 px-6 font-semibold">Kode Produk</th>
                        <th class="py-4 px-6 font-semibold">Nama Produk</th>
                        <th class="py-4 px-6 font-semibold">Harga</th>
                        <th class="py-4 px-6 font-semibold">Stok</th>
                        <th class="py-4 px-6 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white text-gray-700 text-sm">
                    @forelse ($produks as $item)
                        <tr class="hover:bg-indigo-50/50 transition duration-150">
                            <td class="py-4 px-6">
                                @if($item->foto)
                                    <img src="{{ asset('storage/produk/' . $item->foto) }}" alt="Foto" class="w-12 h-12 object-cover rounded-lg shadow-sm border border-gray-200">
                                @else
                                    <span class="text-xs text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-900">{{ $item->kode_produk }}</td>
                            <td class="py-4 px-6 font-semibold text-indigo-900">{{ $item->nama_produk }}</td>
                            <td class="py-4 px-6 text-emerald-600 font-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $item->stok > 10 ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ $item->stok }} Unit
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center space-x-3">
                                <form action="/produk/{{ $item->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')" class="text-rose-500 hover:text-rose-700 font-medium bg-transparent border-none cursor-pointer transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-400 italic">Belum ada data produk di Toko Sinar Sintang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
