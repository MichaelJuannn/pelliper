<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Berita: {{$data->title}}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div>
            <div>{{$data->content}}</div>
        </div>
        <div class="flex">
            <a href={{ route('news.edit', ['news'=>$data->id]) }}><button
                    class="px-3 py-2 m-2 rounded bg-blue-500">Update</button></a>
            <form action={{ route('news.destroy', ['news'=>$data->id]) }} method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-2 m-2 rounded bg-red-500">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>