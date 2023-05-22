<x-layout>
    <x-card class="p-10 max-w-xl mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Post House to Rent
            </h2>
            <p class="mb-4">Post a House/Apartment to find Clients/Tenants</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="aprtmnt_name" class="inline-block text-lg mb-2">Apartment/House Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="aprtmnt_name"
                    value="{{ old('aprtmnt_name') }}" />
                @error('aprtmnt_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="house_aprt_type" class="inline-block text-lg mb-2">House/Apartment Type</label>
                <select name="house_aprt_type" id="house_aprt_type-id"
                    class="border border-gray-200 rounded p-3 w-full bg-white">
                    <option value="">-- Select Apartment/House --</option>
                    @foreach ($apartment_types as $at)
                        <option class="p-3 bg-white" value="{{ $at->id }}">{{ $at->apartment_type_name }}</option>
                    @endforeach
                </select>

                @error('house_aprt_type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price per Month</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
                    placeholder="5000" value="{{ old('price') }}" />
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">House/Apartment Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Place,Subcounty e.g Manguo,Limuru" value="{{ old('location') }}" />
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="county_id" class="inline-block text-lg mb-2">In County</label>
                <select name="county_id" id="county-id" class="border border-gray-200 rounded p-3 w-full bg-white">
                    <option value="">--Select County--</option>
                    @foreach ($counties as $county)
                        <option class="p-3 bg-white" value="{{ $county->id }}">{{ $county->name }}</option>
                    @endforeach
                </select>

                @error('county_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="closest_town" class="inline-block text-lg mb-2">Closest Town</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="closest_town"
                    placeholder="Kiambu Town" value="{{ old('closest_town') }}" />
                @error('closest_town')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="contact_phone_number" class="inline-block text-lg mb-2">Contact Phone Number</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contact_phone_number"
                    value="{{ old('contact_phone_number') }}" />
                @error('contact_phone_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="extras" class="inline-block text-lg mb-2">
                    Extras
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="extras"
                    placeholder="Example: parking, wifi, solar heated water, " value="{{ old('extras') }}" />
                @error('extras')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="main_image" class="inline-block text-lg mb-2">
                    Apartment/House Front/Main Image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="main_image" />
                @error('main_image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    About/Description of Apartment
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Maybe some history of the House">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
