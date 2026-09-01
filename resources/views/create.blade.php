<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Toko Sinar Sintang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-indigo-950 to-blue-900 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-lg rounded-2xl shadow-2xl p-8 border border-white/20">
        <h2 class="text-2xl font-bold text-indigo-950 mb-6 text-center border-b pb-4">Tambah Produk Baru</h2>

        @if ($errors->any())
            <div class="bg-rose-50 text-rose-700 p-4 rounded-xl mb-6 border border-rose-200 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/produk" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Produk</label>
                <input type="text" name="kode_produk" value="{{ old('kode_produk') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" value="{{ old('harga') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                <input type="number" name="stok" value="{{ old('stok') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Foto Produk</label>
                <input type="file" name="foto" class="w-full px-3 py-2 border border-gray-300 rounded-xl text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <div class="flex items-center justify-between pt-4">
                <a href="/produk" class="px-5 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-xl hover:bg-gray-200 transition">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-lg shadow-indigo-500/30 transition">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>

</body>
</html>
