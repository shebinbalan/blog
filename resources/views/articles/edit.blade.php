@extends('articles.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit tags</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('articles.update',$article->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="title" value="{{ $article->title }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $article->description }}</textarea>
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Tags:</strong>
        <select class="form-control" name="tag_id[]" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
                <br>
                <td><img src="/images/{{ $article->image }}" width="100px"></td>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
    <strong>Category:</strong>
    <select class="form-control" name="category_id">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
          
          
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection