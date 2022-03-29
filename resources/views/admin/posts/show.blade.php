@extends('layouts.app')

@section('content')
<div class="container text-center">
  <h1 class="mt-3">{{$post->title}}</h1>
  <p class="my-1">{{$post->content}}</p>
  <p>
    @foreach ($post->tags as $tag)
      {{$tag->name}}
    @endforeach
  </p>
  <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="mb-3">
      @csrf
      @method("DELETE")
      <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro?')"><i class="fa-solid fa-trash-can"></i></button>
  </form>

  @if (count($post->comments) >0)
  <div>
    <h3>Commenti</h3>
    <table class="table">
      <tbody>
        @foreach ($post->comments as $comment)
        <tr>
          <td>{{$comment->content}}</td>
          <td>
            @if (!$comment->approved)
              <form action="{{route('admin.comments.update', $comment->id)}}" method="POST">
                @csrf
                @method("PATCH")
                <button type="submit" class="btn btn-success">Approva</button>
              </form>
            @else
                Approvato
            @endif
          </td> 
          <td>
            <form action="{{route('admin.comments.destroy', $comment->id)}}" method="POST">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
          </td> 
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
      
  @endif

  <a href="{{route('admin.posts.index')}}"><button type="button" class="btn btn-dark">Back</button></a>
</div>
@endsection

