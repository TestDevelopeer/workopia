@props([
    'headding' => 'Looking to hire?',
    'subheading' => 'Post your job listing now and find the perfect
                candidate.',
])

<!-- Bottom Banner -->
<section class="container mx-auto my-6">
    <div class="bg-blue-800 text-white rounded p-4 flex items-center justify-between flex-col md:flex-row gap-4">
        <div>
            <h2 class="text-xl font-semibold">{{ $headding }}</h2>
            <p class="text-gray-200 text-lg mt-2">
                {{ $subheading }}
            </p>
        </div>
        <x-button-link url="/job/create" icon="edit">Create Job</x-button-link>
    </div>
</section>
