<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('companies')" :active="request()->routeIs('companies')">
                        {{ __('Companies') }}
                    </x-nav-link>
                </div>
                <div class="sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('employees')" :active="request()->routeIs('employees')">
                        {{ __('Employees') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
