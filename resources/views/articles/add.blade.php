@extends("layouts.app");

@section('content')

<div class="container">
    @if($errors->any())
        <div class="alert alert-warning">
            <ol>
                @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
                @endforeach
            </ol>
        </div>
    @endif

    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="">Content</label>
            <textarea name="body" id="" placeholder="Write Here..." class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="">Category</label>
            <select name="category_id" id="" class="form-select">
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}"> {{ $category['name'] }} </option>
                @endforeach
            </select>          
        </div>
        
        <div class="mb-3">
            <input type="submit" value="Add Article" class="btn btn-outline-success">
        </div>

    </form>
    
</div>


@endsection