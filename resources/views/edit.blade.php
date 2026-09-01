<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kode Produk</label><br>
        <input type="text" name="kode_produk" value="{{ $produk->kode_produk }}" readonly><br><br>

        <label>Nama Produk</label><br>
        <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}"><br><br>

        <label>Harga</label><br>
        <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}"><br><br>

        <label>Stok</label><br>
        <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}"><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('produk.index') }}">Batal</a>
    </form>
</body>
</html>