<x-layout>
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class="flex flex-row">
            <div class="basis-1/2 ">
                <x-card class="p-10">
                    <img class="w-full mr-6 mb-6"
                        src="{{ $listing->main_image ? asset('storage/' . $listing->main_image) : asset('images/no-image.png') }}"
                        alt="" />
                </x-card>
            </div>
            <div class="basis-1/2 ">
                <x-card class="p-10">
                    <div class="flex flex-col items-left justify-left text-left">


                        <h3 class="text-2xl mb-2">{{ $listing->aprtmnt_name }}</h3>
                        <div class="text-xl font-bold mb-4">{{ $listing->apartmentType->apartment_type_name }}</div>
                        {{-- tags --}}
                        <x-listing-tags :tagsCsv="$listing->extras" />
                        {{-- endtags --}}
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{ $listing->location }} Minutes away from: <span
                                class="font-bold">{{ $listing->closest_town }}</span>
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Apartment/House Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{ $listing->description }}
                                </p>


                                <a href="mailto:{{ $listing->email }}"
                                    class=" text-center block bg-white border-2 border-orange-500 mt-6 py-2 hover:opacity-80"><i
                                        class="fa-solid fa-envelope text-orange-500"></i>
                                    Contact Employer</a>

                                <a href="#" target="_blank"
                                    class="text-center block bg-white border-2 border-green-500 mt-6 py-2 hover:opacity-80"><i
                                        class="fa-solid fa-phone text-green-500"></i> Call/Whatsapp:
                                    {{ $listing->contact_phone_number }}</a>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>


        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{ $listing->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>
            <form method="POST" action="/listings/{{ $listing->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card>
    </div>
</x-layout>
