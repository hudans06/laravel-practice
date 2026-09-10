<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi ToDo List</title>
    <style>
        /* Pengaturan Dasar */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f3f4f6; 
            color: #333; 
            line-height: 1.6; 
        }
        
        /* Wadah Utama (Container) */
        .container { 
            max-width: 800px; 
            margin: 50px auto; 
            background: #ffffff; 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
        }

        /* Bagian Header & Tombol Utama */
        .header-title { 
            font-size: 26px; 
            color: #111827; 
            margin-bottom: 20px; 
            border-bottom: 2px solid #e5e7eb; 
            padding-bottom: 15px; 
        }
        .btn-primary { 
            background-color: #3b82f6; 
            color: #fff; 
            border: none; 
            padding: 10px 18px; 
            border-radius: 6px; 
            font-weight: 600; 
            cursor: pointer; 
            text-decoration: none; 
            transition: background 0.2s; 
            display: inline-block; 
            margin-bottom: 25px; 
        }
        .btn-primary:hover { background-color: #2563eb; }

        /* Desain Kartu ToDo */
        .todo-item { 
            background: #fff; 
            border: 1px solid #e5e7eb; 
            border-radius: 8px; 
            padding: 20px; 
            margin-bottom: 15px; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.05); 
            transition: transform 0.2s, box-shadow 0.2s; 
        }
        .todo-item:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 6px 12px rgba(0,0,0,0.1); 
            border-color: #d1d5db; 
        }

        /* Teks dalam Kartu */
        .todo-title { font-size: 18px; font-weight: 600; color: #1f2937; margin-bottom: 8px; }
        .todo-desc { font-size: 15px; color: #4b5563; margin-bottom: 15px; }
        .done { text-decoration: line-through; color: #9ca3af; }

        /* Indikator Status */
        .status-done { color: #059669; font-size: 0.9em; font-weight: 600; margin-bottom: 12px; }
        .status-pending { color: #d97706; font-size: 0.9em; font-weight: 600; margin-bottom: 12px; }

        /* Baris Tombol Aksi (Bawah Kartu) */
        .actions-row { 
            display: flex; 
            align-items: center; 
            gap: 20px; 
            border-top: 1px solid #f3f4f6; 
            padding-top: 15px; 
        }
        .actions-row form { margin: 0; }
        .toggle-label { 
            font-size: 14px; 
            color: #4b5563; 
            cursor: pointer; 
            display: flex; 
            align-items: center; 
            gap: 8px; 
        }
        
        /* Tombol Hapus */
        .btn-delete { 
            color: #dc2626; 
            background: none; 
            border: none; 
            cursor: pointer; 
            font-size: 14px; 
            font-weight: 600; 
            transition: color 0.2s; 
        }
        .btn-delete:hover { color: #991b1b; text-decoration: underline; }
        
        .empty-state { text-align: center; color: #6b7280; padding: 30px 0; font-style: italic; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header-title">Daftar Pekerjaan (ToDo)</h1>
        
        <a href="/create" style="text-decoration: none;">
            <button class="btn-primary">+ Buat ToDo Baru</button>
        </a>

        @if($todos->isEmpty())
            <p class="empty-state">Belum ada ToDo. Silakan buat tugas baru!</p>
        @else
            @foreach($todos as $item)
                <div class="todo-item">
                    <!-- Judul & Keterangan -->
                    <h3 class="todo-title {{ $item->is_done ? 'done' : '' }}">{{ $item->judul }}</h3>
                    <p class="todo-desc">{{ $item->keterangan }}</p>
                    
                    <!-- Status -->
                    @if($item->is_done)
                        <p class="status-done">✔ Selesai pada: {{ $item->completed_at }}</p>
                    @else
                        <p class="status-pending">⏳ Belum Selesai</p>
                    @endif

                    <!-- Baris Aksi (Checkbox & Hapus sejajar) -->
                    <div class="actions-row">
                        <!-- Toggle Form -->
                        <form action="/toggle/{{ $item->id }}" method="POST">
                            @csrf
                            <label class="toggle-label">
                                <input type="checkbox" onchange="this.form.submit()" {{ $item->is_done ? 'checked' : '' }}> 
                                {{ $item->is_done ? 'Batalkan selesai' : 'Tandai sudah diselesaikan' }}
                            </label>
                        </form>

                        <!-- Delete Form -->
                        <form action="/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Hapus Tugas</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>