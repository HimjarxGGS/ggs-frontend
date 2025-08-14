@extends('guest.layouts.app')

@section('content')
<div class="min-h-screen flex flex-col">

    {{-- Blog Detail Section --}}
    <section class="max-w-5xl mx-auto py-10 px-5 flex-1">

        {{-- Breadcrumb --}}
        <div class="mt-20 mb-5 text-sm text-gray-500">
            <a href="/" class="hover:underline text-green-600">Home</a> /
            <a href="/blog" class="hover:underline text-green-600">Blog</a> /
            <span class="text-gray-800">Detail Blog</span>
        </div>

        {{-- Blog Image --}}
        <div class="mb-8">
            <img 
                src="{{ asset('images/blog.png') }}" 
                alt="Detail Blog Image"
                class="w-full h-48 md:h-80 object-cover rounded-lg shadow">
        </div>

        {{-- Blog Title & Info --}}
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit
            </h1>
            <p class="text-sm text-gray-500">
                Lorem Ipsum | 8 Juli 2025 | Category
            </p>
        </div>

        {{-- Blog Content --}}
        <div class="text-gray-700 leading-relaxed space-y-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a fermentum mauris. Nulla facilisi. Curabitur luctus nisi ut eros luctus, vitae gravida magna semper.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.</p>

            <p><strong>1. Lorem ipsum dolor sit amet</strong><br>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>

            <p><strong>2. Lorem ipsum dolor sit amet</strong><br>
            Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>

            <p><strong>3. Lorem ipsum dolor sit amet</strong><br>
            Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>

            <p><strong>4. Lorem ipsum dolor sit amet</strong><br>
            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
        </div>

        {{-- Green Message Section --}}
        <div class="mb-16 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <img src="{{ asset('images/blog.png') }}" alt="Image 1" class="rounded-lg w-full">
                <img src="{{ asset('images/blog.png') }}" alt="Image 2" class="rounded-lg w-full">
            </div>
            <p class="text-gray-700 text-sm md:text-base text-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus, sapien at blandit suscipit, risus lorem vulputate lorem, in feugiat neque mi ut nulla.
            </p>
        </div>

        {{-- Related Posts Section --}}
        <div class="mt-16">
            <h2 class="text-2xl font-semibold mb-6">Related</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 0; $i < 4; $i++)
                <div class="space-y-2">
                    <img 
                        src="{{ asset('images/blog.png') }}" 
                        alt="Related Blog Image" 
                        class="w-full h-32 md:h-40 object-cover rounded-lg">
                    <h3 class="text-sm font-semibold leading-tight">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </h3>
                    <p class="text-xs text-gray-500">
                        8 Juli 2025<br>
                        Lorem Ipsum
                    </p>
                </div>
                @endfor
            </div>
        </div>

        {{-- Comment Section --}}
        <div class="mt-12">
            <h2 class="text-xl font-semibold mb-4">Submit Comment</h2>
            <p class="text-gray-500 text-sm mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <form class="space-y-4 max-w-xl">
                <div>
                    <input type="email" placeholder="Enter email*" 
                           class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div>
                    <input type="text" placeholder="Enter name*" 
                           class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div>
                    <textarea placeholder="Enter comment*" 
                              class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:ring-green-300 h-28"></textarea>
                </div>
                <button type="submit"
                        class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">
                    Submit
                </button>
            </form>
        </div>
    </section>

    {{-- Our Partners --}}
    <section class="pt-24 px-6">
        <div class="flex flex-col lg:flex-row md:items-center justify-center gap-10">
            <div class="text-left lg:text-left">
                <h2 class="text-5xl font-bold text-palette-5">
                    our <span class="font-bold">Partners</span>
                </h2>
                <p class="text-gray-500">Lorem Ipsum</p>
            </div>
            <div class="hidden lg:block w-80 h-0.5 bg-gray-300"></div>
        </div>

        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-7 gap-y-8 px-4 max-w-6xl mx-auto mt-14">
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/cnn.png') }}" alt="" class="h-20"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
            <img src="{{ asset('images/Logo.png') }}" alt="" class="h-24"/>
        </div>
    </section>
</div>
@endsection
