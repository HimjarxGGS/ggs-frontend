@extends('member.layouts.app')

@section('title', 'History Pendaftaran')

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-32" x-data="{ open: false }">

        <h1 class="text-2xl font-semibold text-gray-900 mb-8">History Pendaftaran</h1>

        <!-- filter -->
        <form method="GET" action="{{ route('history.index') }}">
            <div
                class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end bg-white border border-gray-500 rounded-xl px-6 py-5 mb-6">

                <!-- tanggal -->
                <div class="flex flex-col">
                    <label class="text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                        class="border border-gray-300 rounded-3xl px-5 py-2 text-sm focus:ring-[#A56B46] focus:border-[#A56B46]" />
                </div>

                <!-- status -->
                <div class="flex flex-col relative" x-data="{ open: false, value: '{{ request('status') }}' }">
                    <label class="text-sm font-medium text-gray-700 mb-1">Status</label>
                    <button type="button" @click="open = !open"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm flex justify-between items-center focus:ring-[#A56B46] focus:border-[#A56B46]">
                        <span x-text="value ? value.charAt(0).toUpperCase() + value.slice(1) : 'Semua'"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- dropdown -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute z-10 top-full left-0 mt-1 w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <button type="submit" name="status" value="" @click="value=''; open=false"
                            class="block w-full text-left px-3 py-2 text-sm hover:bg-gray-100">Semua</button>
                        <button type="submit" name="status" value="success" @click="value='success'; open=false"
                            class="block w-full text-left px-3 py-2 text-sm hover:bg-gray-100">Success</button>
                        <button type="submit" name="status" value="pending" @click="value='pending'; open=false"
                            class="block w-full text-left px-3 py-2 text-sm hover:bg-gray-100">Pending</button>
                    </div>

                </div>

                <!-- button -->
                <div class="flex flex-col md:items-end items-center">
                    <div class="flex gap-3 mt-3 md:mt-0">
                        <button type="submit"
                            class="bg-[#A56B46] text-white md:px-10 py-2 px-14 rounded-3xl hover:bg-[#8a5738] transition">Search</button>

                        <a href="{{ route('history.index') }}"
                            class="bg-gray-200 text-black md:px-10 px-14 py-2 rounded-3xl hover:bg-gray-300 transition">Clear</a>
                    </div>
                </div>
            </div>
        </form>

        <!-- list history -->
        <div class="space-y-4">
            @forelse ($histories as $item)
                <div
                    class="bg-white border border-gray-300 rounded-3xl px-6 py-4 
                    flex flex-col md:grid md:grid-cols-3 md:items-center transition-transform duration-500 transform hover:scale-[1.02] hover:shadow-lg">

                    <!-- nama event -->
                    <div>
                        <p class="text-sm text-gray-500">
                            #{{ $item->id }}
                            <span
                                class="font-semibold text-gray-900">{{ $item->event->name ?? 'Event Tidak Ditemukan' }}</span>
                        </p>
                    </div>

                    <!-- tanggal and status -->
                    <div class="flex justify-between md:justify-center w-full my-3 md:my-0 md:gap-32">
                        <p class="text-sm text-gray-500">
                            {{ $item->event ? \Carbon\Carbon::parse($item->event->event_date)->format('d M Y') : 'Tanggal tidak tersedia' }}
                        </p>
                        @if ($item->status === 'pending')
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Pending</span>
                        @elseif($item->status === 'approved')
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Disetujui</span>
                        @elseif($item->status === 'rejected')
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Ditolak</span>
                        @else
                            <span
                                class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($item->status) }}</span>
                        @endif
                    </div>

                    <!-- button detail -->
                    <div class="flex justify-center md:justify-end">
                        <a href="{{ route('history.show', $item->id) }}"
                            class="bg-[#A56B46] text-white px-32 md:px-10 py-1.5 rounded-3xl hover:bg-[#8a5738] transition mt-10 md:mt-0 text-sm">
                            Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 py-12">
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    @if (request('status') === 'pending')
                        <p class="text-lg font-medium mb-2">Tidak ada pendaftaran pending</p>
                        <p class="text-sm">Semua pendaftaran Anda telah diproses</p>
                    @elseif(request('status') === 'verified')
                        <p class="text-lg font-medium mb-2">Tidak ada pendaftaran yang disetujui</p>
                        <p class="text-sm">Belum ada event yang berhasil Anda ikuti</p>
                    @else
                        <p class="text-lg font-medium mb-2">Belum ada history event</p>
                        <p class="text-sm mb-4">Anda belum mendaftar event apapun</p>
                        <a href="{{ route('member.dashboard.index') }}"
                            class="inline-block bg-[#A56B46] text-white px-6 py-2 rounded-3xl hover:bg-[#8a5738] transition text-sm">
                            Daftar Event Sekarang
                        </a>
                    @endif
                </div>
            @endforelse
        </div>

        <!-- paginate -->
        @if ($histories->hasPages())
            <div class="flex justify-center mt-10">
                <div class="flex space-x-2">

                    <!-- mobile -->
                    <div class="flex md:hidden space-x-2 text-sm">
                        <!-- first -->
                        @if ($histories->onFirstPage())
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">First</span>
                        @else
                            <a href="{{ $histories->url(1) }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">First</a>
                        @endif

                        <!-- prev -->
                        @if ($histories->onFirstPage())
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Prev</span>
                        @else
                            <a href="{{ $histories->previousPageUrl() }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Prev</a>
                        @endif

                        <!-- current page -->
                        <span class="px-3 py-2 bg-palette-3 text-white rounded-lg shadow">
                            {{ $histories->currentPage() }}
                        </span>

                        <!-- next page number -->
                        @for ($i = 1; $i <= 3; $i++)
                            @if ($histories->currentPage() + $i <= $histories->lastPage())
                                <a href="{{ $histories->url($histories->currentPage() + $i) }}"
                                    class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">
                                    {{ $histories->currentPage() + $i }}
                                </a>
                            @endif
                        @endfor

                        <!-- next -->
                        @if ($histories->hasMorePages())
                            <a href="{{ $histories->nextPageUrl() }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Next</a>
                        @else
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Next</span>
                        @endif

                        <!-- last -->
                        @if ($histories->currentPage() == $histories->lastPage())
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Last</span>
                        @else
                            <a href="{{ $histories->url($histories->lastPage()) }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Last</a>
                        @endif
                    </div>

                    <!-- desktop -->
                    <div class="hidden md:flex space-x-2">
                        <!-- utama -->
                        @if ($histories->onFirstPage())
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">First</span>
                        @else
                            <a href="{{ $histories->url(1) }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">First</a>
                        @endif

                        <!-- prev -->
                        @if ($histories->onFirstPage())
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Prev</span>
                        @else
                            <a href="{{ $histories->previousPageUrl() }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Prev</a>
                        @endif

                        <!-- ellipsis -->
                        @foreach ($histories->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $histories->currentPage())
                                <span
                                    class="px-3 py-2 bg-palette-3 text-white rounded-lg shadow">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">{{ $page }}</a>
                            @endif
                        @endforeach

                        <!-- next -->
                        @if ($histories->hasMorePages())
                            <a href="{{ $histories->nextPageUrl() }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Next</a>
                        @else
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Next</span>
                        @endif

                        <!-- last -->
                        @if ($histories->currentPage() == $histories->lastPage())
                            <span
                                class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed shadow">Last</span>
                        @else
                            <a href="{{ $histories->url($histories->lastPage()) }}"
                                class="px-3 py-2 bg-white text-gray-700 rounded-lg shadow hover:bg-gray-200">Last</a>
                        @endif
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection