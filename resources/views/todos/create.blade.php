<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat ToDo Baru</title>
    <!-- Memanggil Bootstrap dari folder public/css -->
    <link rel="stylesheet" href="{{ asset('Assets/css/bootstrap.min.css') }}">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h4 border-bottom pb-3 mb-4 font-weight-bold">Buat ToDo Baru</h2>
                        
                        <form action="/store" method="POST">
                            @csrf 
                            
                            <div class="form-group">
                                <label for="judul" class="font-weight-bold text-dark">Judul ToDo</label>
                                <input type="text" class="form-control" id="judul" name="judul" required placeholder="Contoh: Belajar Logika PLC">
                            </div>

                            <div class="form-group">
                                <label for="keterangan" class="font-weight-bold text-dark">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Detail pekerjaan..."></textarea>
                            </div>

                            <div class="bg-light p-3 border rounded mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_done" name="is_done" value="1">
                                    <label class="custom-control-label font-weight-bold text-dark" for="is_done">Tandai sudah selesai</label>
                                </div>
                                <small class="text-muted d-block mt-1 pl-4">*Biarkan kotak kosong jika tugas belum selesai</small>
                            </div>

                            <div class="pt-2 border-top border-light">
                                <button type="submit" class="btn btn-primary px-4 font-weight-bold">Simpan ToDo</button>
                                <a href="/" class="btn btn-link text-secondary font-weight-bold ml-2">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>