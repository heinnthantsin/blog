@extends("layouts.app");

@section("content")

    <div class="container">

    @if(session("info"))
        <div class="alert alert-info">
            {{ session("info") }}
        </div>
    @endif

    {{ $articles->links() }}

    @foreach($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $article->title }}
                    </h4>
                    <small class="text-muted">
                        {{ $article->created_at->diffForHumans() }}
                    </small>
                    <p>
                        {{ $article->body }}
                    </p>

                    <div>
                        Category: <b>{{$article->category->name}}</b>
                    </div>

                    <div>
                        Author : <b>{{ $article->user->name }}</b>
                    </div>

                    <div>
                        <b>Comments ({{ count ($article->comments) }})</b>
                    </div>

                    <a class="card-link" href="{{ url("/articles/detail/$article->id") }}">
                    View Details &raquo
                    </a>
                </div>
            </div>

    @endforeach
    </div>

@endsection