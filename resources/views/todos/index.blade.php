<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi ToDo List</title>
    <!-- Memanggil Bootstrap dari folder public/css -->
    <link rel="stylesheet" href="{{ asset('Assets/css/bootstrap.min.css') }}">
    <style>
        body { background-color: #f8f9fa; }
        .done-text { text-decoration: line-through; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h1 class="h3 border-bottom pb-3 mb-4 font-weight-bold">Daftar Pekerjaan (ToDo)</h1>
                        <a href="/create" class="btn btn-primary mb-2">+ Buat ToDo Baru</a>
                    </div>
                </div>

                @if($todos->isEmpty())
                    <div class="alert alert-secondary text-center text-muted font-italic shadow-sm">
                        Belum ada ToDo. Silakan buat tugas baru!
                    </div>
                @else
                    @foreach($todos as $item)
                        <!-- Todo Item Card -->
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold {{ $item->is_done ? 'done-text' : 'text-dark' }}">
                                    {{ $item->judul }}
                                </h4>
                                <p class="card-text text-secondary mb-3">{{ $item->keterangan }}</p>
                                
                                @if($item->is_done)
                                    <p class="text-success small font-weight-bold mb-3">✔ Selesai pada: {{ $item->completed_at }}</p>
                                @else
                                    <p class="text-warning small font-weight-bold mb-3">⏳ Belum Selesai</p>
                                @endif

                                <!-- Aksi (Flexbox Bootstrap) -->
                                <div class="d-flex align-items-center pt-3 border-top">
                                    <form action="/toggle/{{ $item->id }}" method="POST" class="mr-4 mb-0">
                                        @csrf
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check_{{ $item->id }}" onchange="this.form.submit()" {{ $item->is_done ? 'checked' : '' }}>
                                            <label class="custom-control-label text-secondary cursor-pointer" for="check_{{ $item->id }}">
                                                {{ $item->is_done ? 'Batalkan selesai' : 'Tandai sudah diselesaikan' }}
                                            </label>
                                        </div>
                                    </form>

                                    <form action="/delete/{{ $item->id }}" method="POST" class="mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger font-weight-bold p-0" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Hapus Tugas</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
</html>