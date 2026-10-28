<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library - Detail Buku</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; margin: 0; padding: 0; }
        body { background-color: #f4f6f9; color: #333; }
        .header { background-color: #2b4162; color: white; text-align: center; padding: 20px; font-size: 24px; font-weight: bold; }
        .container { max-width: 500px; margin: 30px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { font-size: 18px; margin-bottom: 15px; }
        .btn { display: block; width: 100%; padding: 10px; background-color: #2b4162; color: white; text-align: center; border: none; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; margin-top: 15px; }
        .btn:hover { background-color: #1e304a; }
        .card { background-color: #f9f9f9; border: 1px solid #ddd; padding: 12px; margin-bottom: 12px; border-radius: 4px; font-size: 14px; line-height: 1.5; }
        .card-title { font-weight: bold; font-size: 16px; margin-bottom: 5px; }
        .alert-success { background-color: #e8f5e9; color: #1b5e20; border: 1px solid #c8e6c9; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="header">Digital Library Laravel</div>
    <div class="container">
        <h2>Detail Katalog &amp; Buku</h2>

        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        @if($buku->isEmpty())
            <div class="card">Belum ada data buku.</div>
        @endif

        @foreach($buku as $row)
            <div class="card">
                <div class="card-title">{{ $row->judul }}</div>
                <div>ISBN: {{ $row->isbn }}</div>
                <div>Pengarang: {{ $row->pengarang }}</div>
                <div>Tahun Terbit: {{ $row->tahun_terbit }}</div>
                <div>Kategori: {{ $row->kategori }}</div>
                
                <div style="margin-top: 12px; display: flex; gap: 8px;">
                    <a href="{{ route('buku.edit', $row->id) }}" style="padding: 6px 12px; background-color: #f0ad4e; color: white; text-decoration: none; border-radius: 4px; font-size: 13px;">Edit</a>
                    
                    <form action="{{ route('buku.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding: 6px 12px; background-color: #d9534f; color: white; border: none; border-radius: 4px; font-size: 13px; cursor: pointer;">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach

        <a href="{{ route('buku.create') }}" class="btn">+ Tambah Buku Baru</a>
    </div>
</body>
</html>