<x-app-layout>
    <x-slot name="header">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('employees.create') }}">Create Employee +</a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{ session()->get('message') }}</strong>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Employee name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Company
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $employee->full_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $employee->company->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $employee->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $employee->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="employees/{{ $employee->id }}" >Edit</a>
                                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                            @csrf
                                            @method('delete')
                                                <button type="submit" title="Delete Post">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No users</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-center">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
