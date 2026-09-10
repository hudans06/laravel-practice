<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi ToDo List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .todo-item { margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .done { text-decoration: line-through; color: gray; }
        .status-done { color: green; font-size: 0.9em; }
        .status-pending { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <h1>Daftar Pekerjaan (ToDo)</h1>
    
    <a href="/create">
        <button style="padding: 10px; cursor: pointer;">+ Buat ToDo Baru</button>
    </a>
    
    <hr>

    @if($todos->isEmpty())
        <p>Belum ada ToDo. Silakan buat baru!</p>
    @else
        @foreach($todos as $item)
            <div class="todo-item">
                <h3 class="{{ $item->is_done ? 'done' : '' }}">{{ $item->judul }}</h3>
                <p>{{ $item->keterangan }}</p>
                
                @if($item->is_done)
                    <p class="status-done">✔ Selesai pada: {{ $item->completed_at }}</p>
                    <form action="/toggle/{{ $item->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        <label style="cursor: pointer; color: gray;">
                            <input type="checkbox" checked onchange="this.form.submit()"> Batalkan selesai
                        </label>
                    </form>
                @else
                    <p class="status-pending">⏳ Belum Selesai</p>
                    <form action="/toggle/{{ $item->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        <label style="cursor: pointer;">
                            <input type="checkbox" onchange="this.form.submit()"> Tandai sudah diselesaikan
                        </label>
                    </form>
                @endif

                <!-- Form Tombol Hapus -->
                <form action="/delete/{{ $item->id }}" method="POST" style="display: inline-block; margin-left: 20px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline; font-size: 0.9em;">Hapus Tugas</button>
                </form>
                
            </div>
        @endforeach
    @endif
</body>
</html>