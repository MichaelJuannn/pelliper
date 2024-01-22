<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Berita Judul: {{ $data->title }}
        </h2>
    </x-slot>
    <div class="m-3">
        <form action={{ route('news.update', ['news'=>$data->id]) }} method="POST" enctype="multipart/form-data"
            class="max-w-sm">
            @csrf
            @method('PATCH')
            <div class="mb-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">News Title</label>
                <input type="text" name="title" id="title"
                    class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-2">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                <textarea name="content" id="content" cols="30" rows="10"
                    class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
            </div>
            <button type="submit" class="bg-blue-400 rounded px-3 py-2">Submit</button>
        </form>
    </div>
</x-app-layout>