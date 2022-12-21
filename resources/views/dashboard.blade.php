<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600">Add Post</h1>
                    <form class="w-1/2 " action="{{route('add-post')}}" method="post">
                        @csrf
                        @error('title')
                            <span class=" text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <input class="@error('title') border-red-200 @else border-green @enderror mb-5 w-full " type="text" name="title">
                        <br>
                        @error('content')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <textarea name="content" class="@error('content') border-red-200 @else border-green @enderror w-full mb-6"></textarea>
                        <br>
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
