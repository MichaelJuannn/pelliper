<x-guest-layout>
    @foreach ($data as $news)
    <div class="max-w-md bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-3">
        <div class="md:flex">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"></div>
                <p class="block mt-1 text-lg leading-tight font-medium text-black">{{$news->created_at}}</p>
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">Judul</div>
                <p class="block mt-1 text-lg leading-tight font-medium text-black capitalize">{{$news->title}}</p>
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mt-4">Preview</div>
                <p class="mt-2 text-gray-500">{{substr($news->content, 0 ,30)}}</p>
                <a href={{ route('news.details', ['news'=>$news->id]) }}> More...</a>
            </div>
        </div>
    </div>
    @endforeach
</x-guest-layout>