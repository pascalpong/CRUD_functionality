<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Company Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update company information") }}
                            </p>
                        </header>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">{{ $error }}</strong>
                            </div>
                            @endforeach
                        @endif
                        @if(session()->has('message'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">{{ session()->get('message') }}</strong>
                            </div>
                        @endif
                        <form method="post" action="{{ route('companies.update',['company'=>$company]) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')
                            <input name="name" placeholder="Name" value="{{ $company->name }}">
                            <input name="address" placeholder="Address" value="{{ $company->address }}">
                            <input name="email" placeholder="Email" value="{{ $company->email }}">
                            <img src="{{ asset('/storage/'.$company->logo) }}" style="height:100px;width:100px;object-fit:cover;">
                            <input name="logo" type="file" placeholder="Logo" value="{{ asset('/storage/'.$company->logo) }}">
                            <input name="website" placeholder="Website" value="{{ $company->website }}">


                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
