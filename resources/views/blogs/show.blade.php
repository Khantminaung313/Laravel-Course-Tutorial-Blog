@props(['randomBlog', 'blog'])
<x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="/storage/{{$blog->thumbnail}}"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <h6>Author - <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a></h6>
                <a href="/categories/{{ $blog->category->slug }}">
                    <p class="btn btn-info">{{ $blog->category->name }}</p>
                </a>
                <div class="text-secondary">{{ $blog->created_at->diffForHumans() }}</div>
                <form action="/blogs/{{$blog->slug}}/subscription" method="post">
                    @csrf
                    @auth
                        @if (auth()->user()->isSubscribed($blog))
                            <button class="btn btn-secondary" type="submit">Subscribed</button>
                        @else
                            <button class="btn btn-warning" type="submit">Subscribe</button>
                        @endif
                    @endauth
                </form>
                <p class="lh-md">
                    {!! $blog->body !!}
                </p>
            </div>
        </div>
    </div>

    @auth
        <section class="container">
            <div class="col-md-8 mx-auto">
                <x-card-wrapper class="bg-secondary">
                    <form action="/blogs/{{ $blog->slug }}/comments" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control border border-0" name="body" cols="10" rows="5" placeholder="Say something"></textarea>
                        </div>
                        @error('body')
                            <p class="text-danger">{{$message}}</p>
                        @enderror

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Post</button>
                        </div>
                    </form>
                </x-card-wrapper>
            </div>
        </section>
    @else
        <p class="text-center"><a href="/login">Login</a> to post your comments</p>
    @endauth

    @if ($blog->comments()->count())
        <x-comments :comments="$blog
            ->comments()
            ->latest()
            ->paginate(3)" />
    @endif

    <x-blog-you-may-like :randomBlog="$randomBlog" />
</x-layout>
