<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        // Mengambil semua data ToDo dari database
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create() {
        // Menampilkan halaman form pembuatan ToDo
        return view('todos.create');
    }

    public function store(Request $request) {
        $request->validate(['judul' => 'required']);

        $todo = new Todo();
        $todo->judul = $request->judul;
        $todo->keterangan = $request->keterangan;
        
        // Logika checkbox
        if ($request->has('is_done')) {
            $todo->is_done = true;
            $todo->completed_at = now();
        } else {
            $todo->is_done = false;
        }

        // Perintah save() dan redirect() harus berada di DALAM fungsi store
        $todo->save();
        return redirect('/');
    }

    public function toggle($id) {
        $todo = Todo::find($id);
        $todo->is_done = !$todo->is_done; // Balikkan statusnya
        
        if ($todo->is_done) {
            $todo->completed_at = now();
        } else {
            $todo->completed_at = null;
        }
        
        $todo->save();
        return redirect('/');
    }

    public function destroy($id) {
        // Mencari data berdasarkan ID, lalu menghapusnya dari database
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
        }
        
        // Memuat ulang halaman utama
        return redirect('/');
    }
}