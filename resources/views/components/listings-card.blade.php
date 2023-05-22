@props(['listing'])

<x-card class="p-6">
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $listing->main_image ? asset('storage/' . $listing->main_image) : asset('images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->aprtmnt_name }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->apartmentType->apartment_type_name }}</div>
            <div class="text-xl font-bold mb-4">Rent per Month: Ksh{{ $listing->price }}</div>

            <x-listing-tags :extrasCsv="$listing->extras" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }} - <span
                    class="font-bold">{{ $listing->county->name }} County </span>
            </div>
        </div>
    </div>
</x-card>
