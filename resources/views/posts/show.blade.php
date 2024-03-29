@extends('layouts.app')

@section('content')
<h3>
{{$posts->title}}
</h3>
<img style="width: 100%" src="/storage/cover_images/{{$posts->cover_image}}">
<div>
{!!$posts->body!!}
</div>
<hr>
<small>written on {{$posts->created_at}} by {{$posts->user->name}}</small>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $posts->user_id)
<a href="/posts/{{$posts->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'POST', 'class' => ''])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif
        @endsection