@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p>{{ $event->description }}</p>
    <p>Start Time: {{ $event->start_time }}</p>
    <p>End Time: {{ $event->end_time }}</p>
    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
