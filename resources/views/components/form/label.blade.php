@props(['name']) # TODO: remove 1 blank line below


<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
       for="{{ $name }}" 
    >
    {{ ucwords($name) }}
</label>
