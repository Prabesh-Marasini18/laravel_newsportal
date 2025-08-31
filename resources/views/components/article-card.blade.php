   @props(['article'])

   <a href="{{ route('article', $article->slug) }}" class="grid grid-cols-3 rounded-md overflow-hidden items-center gap-2 shadow hover:shadow-lg ">
        <img class="w-full h-[90px] object-cover" src="{{asset($article->image)}}" alt="{{$article->title}}">

        <div class="col-span-2">
        <h3 class="font-semibold">
            {{$article->title}}
        </h3>
        <p class="text-xs">
            {{Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from($article->created_at)->toNepaliDate()}}
        </p>
        </div>
    </a>
