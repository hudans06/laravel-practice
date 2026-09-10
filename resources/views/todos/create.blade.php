<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat ToDo Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 400px; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Buat ToDo Baru</h1>
    
    <form action="/store" method="POST">
        <!-- @csrf WAJIB ada di setiap form Laravel untuk keamanan -->
        @csrf 
        
        <label for="judul">Judul ToDo:</label>
        <input type="text" id="judul" name="judul" required placeholder="Contoh: Belajar Laravel">

        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan" rows="4" placeholder="Detail pekerjaan..."></textarea>

        <!-- Tambahkan blok kode ini -->
        <div style="margin-bottom: 20px;">
            <label style="cursor: pointer;">
                <input type="checkbox" name="is_done" value="1"> Tandai sudah selesai
            </label>
            <br>
            <small style="color: gray;">*Biarkan kotak kosong jika tugas belum selesai</small>
        </div>
        <!-- Batas akhir penambahan -->

        <button type="submit" style="padding: 10px; cursor: pointer;">Simpan ToDo</button>
        <a href="/" style="margin-left: 10px;">Batal</a>

        <br><br>
    </form>
</body>
</html>