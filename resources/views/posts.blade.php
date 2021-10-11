<x-layout>

    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
           <x-posts-grid :posts="$posts"/>
        @else
            <p class="text-center">No Post yet. Please check back later.</p>
        @endif
        

        {{-- <div class="lg:grid lg:grid-cols-3">
            <x-post-card/>
            <x-post-card/>
            <x-post-card/>
        </div> --}}
    </main>
</x-layout>