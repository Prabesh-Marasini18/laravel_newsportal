<header class="sticky top-0 z-50 bg-white shadow">
    <div class=" container flex items-center justify-between py-5">
       <a href="{{route('home')}}"> <img class="h-[100px]" src="{{asset($company->logo)}}" alt="Logo"></a>
        <div>
            <p>
                @php
                    $engDate = '1996-04-22'
                @endphp
                {{Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from(now())->toNepaliDate()}}
            </p>
            <img class="h-[18px]" src="https://jawaaf.com/frontend/images/redline.png" alt="">
        </div>
    </div>

    <nav class="bg-[var(--primary)] text-white py-4">
        <div class="container flex gap-6 text-lg font-medium]">
            <a href="{{route('home')}}" class="hover:text-[var(--secondary)]">गृहपृष्ठ</a>

            @foreach ($categories as $category)
                <a href="{{route('category', $category->slug)}}" class="hover:text-[var(--secondary)]">{{$category->title}}</a>

            @endforeach



        </div>

    </nav>
</header>
