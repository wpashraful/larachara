<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" >
                    @foreach ($rahims as $item)
                        <div class="">
                            <div class="">
                                <ul class="flex justify-between bg-slate-200 p-2">
                                    <li class="bg-slate-200 mx-5"><a href="#">{{ $item->title }}</a></li> |
                                    <li><a href="">date</a></li>
                                    <li><a href="{{route('editpost', $item->id)}}">edit</a>
                                    </li>
                                    <form method="post" action="{{route('delete.post', $item->id)}}">
                                        @csrf
                                        <button type="submit">delete</button>
                                    </form>
                                </ul>
                            </div>
                    
                        </div>
                        <div class="flex-1 p-2 my-2">
                            <h1>{{$item->content}}</h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
