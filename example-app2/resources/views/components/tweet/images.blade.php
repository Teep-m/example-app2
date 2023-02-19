@props([
    'images' => []
])

@if (count($images) > 0)
    <div x-data="{}" class="px-2">
        <div class="flex justify-center -mx-2">
            @foreach ($images as $image)    
                <div class="w-1/6 px-2 mt-5">
                    <div class="bg-gray-400">
                        <a @click="$dispatch('img-modal', {  imgModalSrc:
                            '{{ asset('storage/images/' . $image->name) }}'  })"
                            class="cursor-pointer"
                        >
                            <img src="{{ asset('storage/images/' . $image->name )}}" 
                                alt="{{ $image->name }}"
                                class="object-fit w-full" 
                            >
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

@once
    <div x-data="{ imgModal : false, imgModalSrc : ''}">
        <div
            @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc;"
            x-cloak
            x-show="imgModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform"
            x-transition:enter-end="opacity-100 transform"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform"
            x-transition:leave-end="opacity-0 transform"
            x-on:click.away="imgModalSrc = ''"
            class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex
                justify-center items-center bg-black bg-opacity-75"
        >
            <div @click.away="imgModal = ''" class="float-right pt-2 pr-2 outline-none">

            </div>
        </div>
    </div>
@endonce