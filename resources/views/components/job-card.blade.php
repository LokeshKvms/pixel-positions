@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer->name }}</div>

    <div class="py-8">
        <h3 class="text-xl font-bold transition-transform duration-300 group-hover:scale-108">{{ $job->title }}</h3>
        <p class="text-sm mt-4">{{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" />            
            @endforeach
        </div>
        <div>
            <x-employer-logo :dim="42"/>
        </div>
    </div>
</x-panel>