<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('contacts.update', $contact) }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="client_id" class="block font-medium text-sm text-gray-700">{{ __('Client') }}</label>
                            <select name="client_id" id="client_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @if($client->id == old('client_id', $contact->client_id)) selected @endif>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="first_name" class="block font-medium text-sm text-gray-700">{{ __('First Name') }}</label>
                            <input id="first_name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="first_name" value="{{ old('first_name', $contact->first_name) }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="last_name" class="block font-medium text-sm text-gray-700">{{ __('Last Name') }}</label>
                            <input id="last_name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="last_name" value="{{ old('last_name', $contact->last_name) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
                            <input id="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="email" name="email" value="{{ old('email', $contact->email) }}" />
                        </div>

                        <div class="mt-4">
                            <label for="phone" class="block font-medium text-sm text-gray-700">{{ __('Phone') }}</label>
                            <input id="phone" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="phone" value="{{ old('phone', $contact->phone) }}" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Contact
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
