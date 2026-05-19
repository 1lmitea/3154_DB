@extends('layouts.admin', ['title' => 'Kelola Kategori'])

@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Manajemen daftar kategori event.')

@section('content')
<div class="flex justify-between items-center mb-6">
    <form action="{{ route('admin.categories.index') }}" method="GET" class="flex w-1/3 shadow-sm rounded-2xl overflow-hidden">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..." class="w-full px-5 py-3 border-y border-l border-slate-200 outline-none focus:bg-slate-50 text-sm font-medium">
        <button type="submit" class="px-6 py-3 bg-indigo-900 text-white font-bold hover:bg-indigo-800 transition text-sm">Cari</button>
    </form>

    <a href="{{ route('admin.categories.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95 text-sm">
        + Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Slug</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($categories as $index => $category)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">{{ $categories->firstItem() + $index }}</td>
                    <td class="px-8 py-6 font-black text-slate-800">{{ $category->name }}</td>
                    <td class="px-8 py-6 text-sm text-slate-400">{{ $category->slug }}</td>
                    <td class="px-8 py-6 flex gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini secara permanen?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-10 text-center text-slate-500 font-medium">Data kategori belum tersedia atau tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $categories->links() }}
    </div>
</div>
@endsection
