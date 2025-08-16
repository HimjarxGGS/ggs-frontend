{{-- Blog List --}}
<div class="space-y-8">
    @foreach ($blogs as $blog)
        <div class="flex flex-col md:flex-row items-start gap-6 border-b pb-6">
            {{-- Blog Text --}}
            <div class="flex-1">
                <a href="{{ route('blog.detail', $blog->slug) }}">
                    <h2 class="font-bold text-lg mb-1 hover:text-green-600 cursor-pointer leading-snug">
                        {{ $blog->title }}
                    </h2>
                </a>
                <p class="text-sm text-gray-500 mb-2">
                    {{ $blog->author }} | {{ $blog->published_at->format('d M Y') }} 
                    | {{ $blog->categories->pluck('category_name')->join(', ') }}
                </p>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ Str::limit(strip_tags($blog->content), 120, '...') }}
                </p>
            </div>

            {{-- Blog Thumbnail --}}
            <img 
                src="{{ asset('storage/'.$blog->img) }}" 
                alt="Blog Thumbnail" 
                class="w-full md:w-48 h-48 md:h-28 rounded-lg object-cover shadow-md">
        </div>
    @endforeach
</div>

{{-- Pagination --}}
<div class="mt-6">
    {{ $blogs->links() }}
</div>
