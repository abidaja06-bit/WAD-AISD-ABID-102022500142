<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library - Tambah Buku</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; margin: 0; padding: 0; }
        body { background-color: #f4f6f9; color: #333; }
        .header { background-color: #2b4162; color: white; text-align: center; padding: 20px; font-size: 24px; font-weight: bold; }
        .container { max-width: 500px; margin: 30px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { font-size: 18px; margin-bottom: 15px; }
        .form-group { margin-bottom: 12px; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input, select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        .btn { display: block; width: 100%; padding: 10px; background-color: #2b4162; color: white; text-align: center; border: none; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; margin-top: 15px; }
        .link-btn { display: block; text-align: center; margin-top: 15px; color: #2b4162; text-decoration: none; font-size: 14px; font-weight: bold; }
        .alert-error { background-color: #fdecea; color: #b71c1c; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="header">Digital Library Laravel</div>
    <div class="container">
        <h2>Tambah Buku Baru</h2>

        @if ($errors->any())
            <div class="alert-error">Data tidak valid. Pastikan semua kolom terisi dengan benar.</div>
        @endif

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" value="{{ old('pengarang') }}" required>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" id="tahun_terbit" name="tahun_terbit" min="1000" max="2155" value="{{ old('tahun_terbit') }}" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($kategoriList as $k)
                        <option value="{{ $k }}" {{ old('kategori') === $k ? 'selected' : '' }}>{{ $k }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn">Simpan Buku</button>
        </form>

        <a href="{{ route('buku.index') }}" class="link-btn">Lihat Detail Katalog Buku &rarr;</a>
    </div>
</body>
</html>