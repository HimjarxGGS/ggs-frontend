@extends('guest.layouts.app')

@section('title', 'List Event - Green Generation Surabaya')

@section('content')
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10">Events</h2>

        <div class="flex justify-center">
            <div class="max-w-md w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <img class="w-full h-48 object-cover" src="https://via.placeholder.com/600x300" alt="Event Image">
                <div class="p-6">
                    <a href="" class="text-xl font-semibold text-gray-800 mb-2">Judul Event</a>
                    <p class="text-gray-600 mb-4">
                        lorem ipsum blabla blebleble blublublu </p>
                    <!-- <a href="#" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-all">
                        Lihat Detail
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
