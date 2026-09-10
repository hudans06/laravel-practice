<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat ToDo Baru</title>
    <style>
        /* Pengaturan Dasar senada dengan Halaman Utama */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f3f4f6; 
            color: #333; 
            line-height: 1.6; 
        }
        
        /* Wadah Form (Container) */
        .container { 
            max-width: 600px; /* Sedikit lebih kecil dari halaman utama agar pas untuk form */
            margin: 50px auto; 
            background: #ffffff; 
            padding: 35px; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
        }

        .header-title { 
            font-size: 24px; 
            color: #111827; 
            margin-bottom: 25px; 
            border-bottom: 2px solid #e5e7eb; 
            padding-bottom: 15px; 
        }

        /* Desain Kolom Input */
        .form-group { margin-bottom: 20px; }
        .form-group label { 
            display: block; 
            font-weight: 600; 
            color: #374151; 
            margin-bottom: 8px; 
        }
        .form-group input[type="text"], .form-group textarea { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #d1d5db; 
            border-radius: 6px; 
            font-size: 15px; 
            font-family: inherit; 
            transition: border-color 0.2s, box-shadow 0.2s; 
        }
        .form-group input[type="text"]:focus, .form-group textarea:focus { 
            outline: none; 
            border-color: #3b82f6; 
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15); 
        }

        /* Desain Area Checkbox */
        .form-checkbox { 
            margin-bottom: 30px; 
            padding: 15px; 
            background: #f9fafb; 
            border-radius: 6px; 
            border: 1px solid #e5e7eb; 
        }
        .toggle-label { 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            font-weight: 500; 
            color: #1f2937; 
            cursor: pointer; 
        }
        .toggle-label input[type="checkbox"] { 
            width: 18px; 
            height: 18px; 
            cursor: pointer; 
        }
        .help-text { 
            display: block; 
            margin-top: 6px; 
            font-size: 13px; 
            color: #6b7280; 
            margin-left: 28px; /* Sejajar dengan teks label */
        }

        /* Desain Baris Tombol */
        .form-actions { 
            display: flex; 
            gap: 15px; 
            align-items: center; 
            border-top: 1px solid #e5e7eb; 
            padding-top: 20px; 
        }
        .btn-primary { 
            background-color: #3b82f6; 
            color: #fff; 
            border: none; 
            padding: 10px 24px; 
            border-radius: 6px; 
            font-weight: 600; 
            font-size: 15px; 
            cursor: pointer; 
            transition: background 0.2s; 
        }
        .btn-primary:hover { background-color: #2563eb; }
        
        .btn-secondary { 
            color: #4b5563; 
            text-decoration: none; 
            font-weight: 600; 
            font-size: 15px; 
            transition: color 0.2s; 
        }
        .btn-secondary:hover { 
            color: #111827; 
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header-title">Buat ToDo Baru</h1>
        
        <form action="/store" method="POST">
            @csrf 
            
            <div class="form-group">
                <label for="judul">Judul ToDo</label>
                <input type="text" id="judul" name="judul" required placeholder="Contoh: Belajar Logika PLC">
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="4" placeholder="Detail pekerjaan..."></textarea>
            </div>

            <div class="form-checkbox">
                <label class="toggle-label">
                    <input type="checkbox" name="is_done" value="1"> 
                    Tandai sudah selesai
                </label>
                <small class="help-text">*Biarkan kotak kosong jika tugas belum selesai</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Simpan ToDo</button>
                <a href="/" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>