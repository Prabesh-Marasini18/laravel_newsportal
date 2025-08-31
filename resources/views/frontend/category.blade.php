<x-frontend-layout :title="$category->title" >
    <section>
        <div class="container py-10 ">
            <h1 class="font-semibold text-2xl mb-4">{{ $category->title }}</h1>
            <div class="grid grid-cols-3 gap-10">
                <div class="col-span-2 space-y-6">
                    @foreach ($category->articles as $article)
                     <div class="grid grid-cols-3 gap-2 items-center border rounded-lg overflow-hidden hover:shadow-lg">
                        <a href="{{ route('article', $article->slug) }}"><img class="w-full h-[250px] object-cover" src="{{ asset($article->image) }}" alt="slug"></a>

                        <div class="col-span-2 p-4 space-y-2">
                            <h2 class="font-semibold text-xl">
                                {{ $article->title }}

                            </h2>
                            <div class="line-clamp-2 text-justify">
                                {!! $article->content !!}
                            </div>

                            <small>
                                 प्रकाशित मितिः
                                {{ Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from($article->created_at)->toNepaliDate() }}
                                | {{ $article->views }} पटक पढिएको
                            </small>

                            <div>
                                <a href="{{ route('article', $article->slug) }}" class="text-[var(--primary)]">
                                पुरा पढ्नुहोस्
                            </a>
                            </div>
                        </div>
                    </div>

                    @endforeach




                </div>

                <div></div>

            </div>

         </div>
    </section>



</x-frontend-layout>
