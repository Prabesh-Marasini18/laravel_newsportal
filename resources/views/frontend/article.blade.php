<x-frontend-layout :title="$article->title" :description="$article->meta_description" :keywords="$article->meta_keywords">

    <section>
        <div class="container py-10 ">

            <div class="grid grid-cols-3 gap-10">
                <div class="col-span-2 space-y-6">
                    <div>
                        <p>
                             प्रकाशित मितिः
                                {{ Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from($article->created_at)->toNepaliDate() }}
                                | {{ $article->views }} पटक पढिएको
                        </p>
                    </div>
                    <h1 class="font-semibold text-2xl mb-4">
                        {{ $article->title }}
                    </h1>

                    <img src="{{ asset($article->image) }}" alt="{{ $article->slug }}">
                    <div>
                        {!! $article->content !!}
                    </div>

                    <div class="fb-like" data-href="http://127.0.0.1:8000/article/{{ $article->slug }}" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>

                    <div class="fb-comments" data-href="http://127.0.0.1:8000/article/{{ $article->slug }}" data-width="" data-numposts="5"></div>
                </div>

                {{-- <div>
                    <div class="fb-page" data-href="https://www.facebook.com/prabesh.marasini.79" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/prabesh.marasini.79" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/prabesh.marasini.79">Prabesh Marasini</a></blockquote></div>
                </div> --}}

            </div>

         </div>
    </section>



</x-frontend-layout>
