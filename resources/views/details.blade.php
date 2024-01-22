<x-guest-layout>
    <div class="py-12 px-4 bg-white">
        <div>
            <h1 class="text-4xl font-bold">{{$data->title}}</h1>
            <div> ditulis oleh {{$data->name}} pada {{$data->created_at}}</div>
            <div class="m-8">{{$data->content}}</div>
        </div>
        <div class="flex">
        </div>
    </div>
</x-guest-layout>