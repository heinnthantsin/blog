@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="card bg-success text-light">
            <div class="card-body">
                <h1>
                    <div>
                        Author : <b>{{ $article->user->name }}</b>
                    </div>
                </h1>
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }},
                    Category: <b>{{ $article->category->name }}</b>
                </div>
                
                <p class="card-text"> {{ $article->body }}</p>

                <div>
                    Category: <b>{{$article->category->name}}</b>
                </div>

                <a class="btn btn-danger me-2 mt-2" href="{{ url("articles/delete/$article->id") }}">
                    Delete
                </a>
                <a class="btn btn-primary  mt-2" href="{{ url("articles") }}">
                    Back
                </a>
            </div>
        </div>

        @if(session('info'))
            <div class="alert alert-warning mt-2">
                {{ session('info') }}
            </div>
        @endif
        <ul class="list-group mt-2">
            <li class="list-group-item active">
                <b>Comments ({{ count($article->comments) }})</b>
            </li>
            
            @foreach($article->comments as $comment)
            <li class="list-group-item">
                {{ $comment->content }}

                <div class="small mt-2">
                    By <b>{{ $comment->user->name }}</b> 
                    {{ $comment->created_at->diffForHumans() }}
                 </div>

                <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close bg-danger float-end"></a>
            </li>
            @endforeach
        </ul>

        @auth
        <form action="{{ url('/comments/add') }}" method="post">
            @csrf

            @if($errors->any())
            <div class="alert alert-warning">
            <ol>
                @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
                @endforeach
            </ol>
            </div>
            @endif

            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control" placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-info mt-2">
        </form>
        @endauth
    </div>

@endsection