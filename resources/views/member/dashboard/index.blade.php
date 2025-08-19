@extends('member.layouts.app')

@section('title', 'Dashboard Member')

@section('content')
<div class="container mx-auto px-4 py-10">
   
   <div class="flex justify-center items-center space-x-6 mb-12 mt-16">
    <img src="{{ asset('images/dashboard page.png') }}"
         alt="Dashboard Page" 
         class="w-80 h-auto">
    <div>
        <h2 class="text-xl">Hi, <em>Komting</em></h2>
        <h1 class="text-2xl font-bold">Welcome to Dashboard Member!</h1>
    </div>
</div>
   
    <section>
        <h3 class="text-2xl font-bold mb-4">Event</h3>
        
     
        <div class="flex flex-col md:flex-row md:items-center md:space-x-6 mb-8 space-y-4 md:space-y-0">
            <input type="text" placeholder="Search Event" class="border border-gray-300 rounded-lg px-4 py-2 w-full md:flex-grow" />
            <select class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-auto">
                <option>Event Terbaru</option>
                <option>Event Terlama</option>
            </select>
        </div>

       
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @for ($i = 0; $i < 6; $i++)
            <div class="border border-gray-200 rounded-xl p-4 shadow-sm bg-white flex flex-col">
                <div class="mb-3 relative">
                    <span class="absolute top-2 left-2 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">Active</span>
                  <img src="{{ asset('images/gambar-event.png') }}" 
     alt="Volunteer Greenovation Batch 2" 
          class="rounded-lg w-40 h-auto object-contain mx-auto">


                </div>
                <h4 class="font-semibold mb-1">Volunteer Greenovation Batch 2</h4>
                <p class="text-gray-500 text-sm mb-3">Green Generation Surabaya</p>
                <p class="text-gray-700 text-sm flex-grow">
                   Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium ut sunt, aperiam voluptates sed, porro provident reiciendis architecto vitae, consequatur harum! Obcaecati numquam a quia, cumque voluptate quo veritatis provident?
                </p>
            </div>
            @endfor
        </div>

       
        <div class="mt-10 flex justify-center space-x-3 text-sm text-gray-600">
            <button class="px-3 py-1 rounded bg-yellow-300 font-semibold">1</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">2</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">3</button>
            <span class="px-3 py-1">...</span>
            <button class="px-3 py-1 rounded hover:bg-gray-200">19</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">20</button>
            <button class="px-3 py-1 rounded hover:bg-gray-200">&gt;</button>
        </div>
    </section>
</div>
@endsection
