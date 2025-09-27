<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Deal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('deals.update', $deal) }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                            <input id="title" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="title" value="{{ old('title', $deal->title) }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description') }}</label>
                            <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">{{ old('description', $deal->description) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label for="value" class="block font-medium text-sm text-gray-700">{{ __('Value ($)') }}</label>
                            <input id="value" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="number" name="value" value="{{ old('value', $deal->value) }}" step="0.01" required />
                        </div>

                        <div class="mt-4">
                            <label for="status" class="block font-medium text-sm text-gray-700">{{ __('Status') }}</label>
                            <select name="status" id="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="new" @if(old('status', $deal->status) == 'new') selected @endif>New</option>
                                <option value="won" @if(old('status', $deal->status) == 'won') selected @endif>Won</option>
                                <option value="lost" @if(old('status', $deal->status) == 'lost') selected @endif>Lost</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="client_id" class="block font-medium text-sm text-gray-700">{{ __('Client') }}</label>
                            <select name="client_id" id="client_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" @if($client->id == old('client_id', $deal->client_id)) selected @endif>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="contact_id" class="block font-medium text-sm text-gray-700">{{ __('Contact (Optional)') }}</label>
                            <select name="contact_id" id="contact_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">Select a contact</option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}" @if($contact->id == old('contact_id', $deal->contact_id)) selected @endif>{{ $contact->first_name }} {{ $contact->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Deal
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
