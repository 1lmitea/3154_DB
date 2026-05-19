@extends('layouts.admin', ['title' => 'Tambah Kategori'])

@section('page_title', 'Tambah Kategori')
@section('page_subtitle', 'Buat kategori baru untuk mengelompokkan event.')

@section('content')
<div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm max-w-2xl mt-4">
    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama Kategori</label>
            <input type="text" name="name" class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" placeholder="Contoh: Hiburan, Teknologi..." required>
        </div>
        <div class="pt-4 flex justify-end gap-4 border-t border-slate-100">
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-4 font-bold text-slate-400 hover:text-slate-600 transition">Batal</a>
            <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">Simpan Kategori</button>
        </div>
    </form>
</div>
@endsection
