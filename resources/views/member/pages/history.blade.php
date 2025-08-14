<!-- @extends('member.layouts.app')

@section('title', 'History Pendaftaran')

@section('content')
<div class="container mx-auto px-6 py-12"> {{-- px lebih kecil, py lebih besar --}}
    
    {{-- Judul Halaman --}}
    <h1 class="text-2xl font-bold text-gray-900 mb-6 mt-6">History Pendaftaran</h1>

    {{-- Filter Form --}}
    <div class="bg-white border border-gray-200 rounded-xl p-5 flex flex-wrap gap-4 items-end mb-8">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <input type="date" class="border border-gray-300 rounded-lg p-2 w-48">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select class="border border-gray-300 rounded-lg p-2 w-48">
                <option>Please Select Status</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg">Clear</button>
            <button class="bg-[#A56B46] text-white px-4 py-2 rounded-lg">Search</button>
        </div>
    </div>

  
    <div class="space-y-4">
        @foreach (range(1, 4) as $i)
        <div class="flex justify-between items-center bg-white border border-gray-200 rounded-xl px-4 py-3">
            <div>
                <p class="text-sm text-gray-500">#123 <span class="font-semibold text-gray-900">Pelatihan Daur Ulang Organik</span></p>
                <p class="text-sm text-gray-500">8 Juli 2025</p>
            </div>
            <div class="flex items-center gap-4">
                @if($i == 1)
                    <span class="text-yellow-500 text-sm font-medium">Pending</span>
                @else
                    <span class="text-green-500 text-sm font-medium">Success</span>
                @endif
                <button class="bg-[#A56B46] text-white px-4 py-1.5 rounded-lg">Detail</button>
            </div>
        </div>
        @endforeach
    </div>

   
    <div class="flex justify-center mt-6">
        <nav class="inline-flex items-center space-x-1">
            <a href="#" class="px-3 py-1 rounded-lg bg-[#A56B46] text-white">1</a>
            <a href="#" class="px-3 py-1 rounded-lg bg-gray-100 text-gray-700">2</a>
            <a href="#" class="px-3 py-1 rounded-lg bg-gray-100 text-gray-700">3</a>
            <span class="px-3 py-1">...</span>
            <a href="#" class="px-3 py-1 rounded-lg bg-gray-100 text-gray-700">20</a>
        </nav>
    </div>

</div>

{{-- Footer --}}
@include('member.components.footer')
@endsection -->
