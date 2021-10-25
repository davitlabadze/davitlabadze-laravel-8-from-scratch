
<x-dropdown> # TODO: remove blank line above
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"> # TODO: remove blank lines below


            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/> # TODO: remove blank lines below
                
        
        
        </button>
    </x-slot>
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category','page')) }}" 
        :active="request()->routeIs('home')">All
    </x-dropdown-item>

    @foreach ($categories as $category)

        <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
            :active='request()->is("categories/{$category->slug}")'> 
            {{ ucwords($category->name) }}
        </x-dropdown-item>
        # TODO remove a tag below
        <a>
        </a>   
    @endforeach # TODO: remove blank lines below


</x-dropdown>    