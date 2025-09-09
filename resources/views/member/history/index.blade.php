@extends('member.layouts.app')

@section('title', 'History Pendaftaran')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12 mt-20">
    
    {{-- Judul Halaman --}}
    <h1 class="text-2xl font-semibold text-gray-900 mb-8">History Pendaftaran</h1>

    {{-- Filter Section --}}
    <form method="GET" action="{{ route('history.index') }}">
        <div class="grid grid-cols-3 gap-8 items-end bg-white border border-gray-300 rounded-xl px-6 py-5 mb-6">
            
            {{-- Date --}}
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ request('tanggal') }}" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-[#A56B46] focus:border-[#A56B46]" />
            </div>

            {{-- Status --}}
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-[#A56B46] focus:border-[#A56B46]">
                    <option value="">Semua</option>
                    <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex flex-col items-end">
                <div class="flex gap-3">
                    <button type="submit" 
                        class="bg-[#A56B46] text-white px-5 py-2 rounded-lg hover:bg-[#8a5738] transition">Search</button>
                    
                    <a href="{{ route('history.index') }}" 
                       class="bg-gray-200 text-black px-5 py-2 rounded-lg hover:bg-gray-300 transition">Clear</a>
                </div>
            </div>
        </div>
    </form>


    {{-- List History --}}
    <div class="space-y-4">
        @foreach ($histories as $item)
        <div class="grid grid-cols-3 items-center bg-white border border-gray-300 rounded-xl px-6 py-4">
            <div>
                <p class="text-sm text-gray-500">
                    #{{ $item->id }} 
                    <span class="font-semibold text-gray-900">{{ $item->name }}</span>
                </p>
            </div>
            <div class="flex justify-center w-full">
                <div class="flex items-center justify-between w-72">
                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->event_date)->format('d M Y') }}</p>
                    @if($item->status === 'pending')
                        <span class="text-yellow-500 text-sm font-medium">Pending</span>
                    @else
                        <span class="text-green-500 text-sm font-medium">Success</span>
                    @endif
                </div>
            </div>
            <div class="flex justify-end pr-4">
                <a href="{{ route('history.show', $item->id) }}" 
                class="bg-[#A56B46] text-white px-6 py-1.5 rounded-lg hover:bg-[#8a5738] transition">
                    Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="flex justify-center mt-10">
        {{ $histories->links() }}
    </div>

</div>
@endsection
