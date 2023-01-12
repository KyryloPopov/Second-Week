@extends('layouts.app')
@section('content')
    <div>
        <h3>
            <p>Title: {{$conference->title}}</p>
            <p>Date: {{$conference->date}}</p>
            <p>Adress:</p>
        </h3>
        <p>Latitude: {{$conference->latitude}}</p>
        <p>Longitude: {{$conference->longitude}}</p>
        <h3>
            <p>Country: {{$country->name}}</p>
        </h3>
    </div>
    <div>
        <a href="{{route('conference.index')}}" class="btn btn-secondary">Back</a>
        <a href="{{route('conference.edit', $conference->id)}}" class="btn btn-warning">Edit</a>
    </div>
@endsection
