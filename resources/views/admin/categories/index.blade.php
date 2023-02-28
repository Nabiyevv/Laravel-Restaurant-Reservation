<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.categories.create') }}"
                    class="py-1.5 px-2 bg-slate-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-500 hover:bg-slate-300 rounded-lg">New Categorie</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-slate-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                            class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name}}
                        </th>
                        <td class="px-4 py-4">
                            {{ $category->description }}
                        </td>
                        <td class="px-4 py-4">
                        <img src="{{ Storage::url($category->image) }}" alt="" class=" h-16 rounded">
                        </td>
                        <td class="px-4 py-4">
                            <div>
                                <a href="{{ route('admin.categories.edit',$category->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </div>
                            <div> 
                                <form action="{{ route('admin.categories.destroy',$category->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure?'); ">
                                    @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>
