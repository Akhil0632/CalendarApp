@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calendar</h1>
    <div id="calendar"></div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/calendar.js') }}"></script>
@endpush
