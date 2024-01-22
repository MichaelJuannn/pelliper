<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ "News" }}
        </h2>
    </x-slot>
    <div class="flex justify-start">
        <a href={{ route('news.create') }}><button class="mx-4 my-5 py-3 px-5 rounded bg-green-400">New
                News</button></a>
    </div>
    <div class="py-4 relative overflow-x-auto">
        <table class="table-auto w-full text-sm text-left rtl:text-right py-10">
            <thead class="text-md text-gray-700 uppercase ">
                <tr class="">
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $news)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$news->title}}</th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$news->created_at}}</td>
                    <td class=""><a href={{route('news.show',['news'=> $news->id])}} class="p-2 px-4
                            bg-gray-200 rounded text-black">Go to Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>