@extends('layouts.app')
@section('content')
    <div>
        <div>
            <a href="{{route('conference.create')}}" class="btn btn-success mb-3">Create</a>
        </div>
        <div>
            @foreach($conferences as $conference)
                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <h3>{{$conference->title}}</h3>
                        <h3>Date: {{$conference->date}}</h3>
                    </div>
                    <div>
                        <a href="{{route('conference.show', $conference->id)}}" class="btn btn-secondary">Details</a>
                    </div>
                </div>
            @endforeach
            <div class="mt-3">
                {{ $conferences->links() }}
            </div>
        </div>
    </div>
@endsection
