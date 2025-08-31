<x-frontend-layout title="Home" description="Welcome to the home page" keywords="news, articles, latest">



    <section>
        <div class="container py-5 grid grid-cols-3 gap-5">
            <div class="col-span-2">

                <div class="shadow hover:shadow-lg mb-4">
                   <a href="{{ route('article', $latest_article->slug) }}"> <img class="w-full h-[400px] object-cover" src="{{asset($latest_article->image)}}" alt="">
                    <div class="p-2">
                        <h1 class="text-3xl font-semibold">{{$latest_article->title}}</h1>

                        <p>
                            {{Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from($latest_article->created_at)->toNepaliDate()}}
                        </p>
                    </div>
                </a>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach ($latest_articles as $article)
                    <x-article-card :article="$article"/>


                    @endforeach



                </div>
            </div>




            <div class="space-y-5">
                <h2 class="font-semibold text-2xl text-[var(--primary)] bg-[var(--light-primary)] border-l-4 border-[var(--primary)] p-2  ">ट्रेन्डिङ</h2>

                @foreach ($trending_articles as $article)
                   <x-article-card :article="$article"/>
                @endforeach



            </div>

        </div>
    </section>

    <section>
        <div class="container space-y-10 py-10">
            @foreach ($categories as $category)
                <h2 class="font-semibold text-2xl text-[var(--primary)] bg-[var(--light-primary)] border-l-4 border-[var(--primary)] p-2  ">
                {{$category->title}}
            </h2>
            <div class="grid grid-cols-4 gap-8">
                @foreach ($category->articles as $article)
                    <x-article-card :article="$article"/>
                @endforeach
            </div>

            @endforeach

        </div>

    </section>

</x-frontend-layout>
