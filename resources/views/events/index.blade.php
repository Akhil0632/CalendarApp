@extends('layouts.app')

@section('content')

<div class="container">
    <form method="GET" action="{{ route('events.index') }}">
        <div class="form-group">
            <label for="filter">Filter by</label>
            <select id="filter" name="filter" class="form-control">
                <option value="">Select filter</option>
                <option value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>

    <h1>Events</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr class="{{ $event->completed ? 'table-success' : 'table-warning' }}">
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->start_time }}</td>
                    <td>{{ $event->end_time }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
</div>
@endsection
