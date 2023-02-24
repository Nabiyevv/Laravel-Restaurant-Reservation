<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index') }}"
                class="py-1.5 px-2 bg-slate-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-500 hover:bg-slate-300 rounded-lg">Category Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded dark:bg-gray-800">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10 ">
                    <form method="POST" enctype="multipart/form-data ">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white"> Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name"
                                    class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-white"> Image </label>
                            <div class="mt-1">
                                <input type="file" id="image" name="image"
                                    class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                            </div>

                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                            <div class="mt-1">
                                <textarea id="description" rows="3" name="description"
                                    class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-400 @enderror"></textarea>
                            </div>

                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit"
                            class="py-1.5 px-2 bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-500 hover:bg-slate-300 rounded-lg">Store</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
