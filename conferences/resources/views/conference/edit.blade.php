@extends('layouts.app')
@section('content')
    <div class="pb-3">
        <h1>Conference editing</h1>
    </div>
    <div class="px-5 w-75">
        <form action="{{route('conference.update', $conference->id)}}" method="POST">
            @csrf
            @method('patch')
            <h3>Title</h3>
            <p><input type="text" name="title" class="form-control" value="{{$conference->title}}"></p>
            @error('title') <p class="text-danger">{{$message}}</p> @enderror
            <h3>Date</h3>
            <p><input type="date" name="date" class="form-control" value="{{$conference->date}}"></p>
            @error('date') <p class="text-danger">{{$message}}</p> @enderror
            <h3>Address:</h3>
            <div id="maps"></div>
            <p>Latitude: <input type="text" name="latitude" class="form-control" value="{{$conference->latitude}}"></p>
            @error('latitude') <p class="text-danger">{{$message}}</p> @enderror
            <p>Longitude: <input type="text" name="longitude" class="form-control" value="{{$conference->longitude}}"></p>
            @error('longitude') <p class="text-danger">{{$message}}</p> @enderror
            <h3>Country</h3>
            <p><select name="country_id" class="form-select">
                    <option disabled>Select country</option>
                    @foreach($countries as $country)
                        <option {{$country->id == $conference->country_id ? ' selected ' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach ($countries as $country) : ?>
                </select>
            </p>
            @error('country_id') <p class="text-danger">{{$message}}</p> @enderror
            <div class="d-flex justify-content-lg-start">
                <div>
                    <a href="{{route('conference.show', $conference->id)}}" class="btn btn-secondary mx-1">Back</a>
                    <form action="{{route('conference.destroy', $conference->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mx-1">Delete</button>
                    </form>
                </div>
                <div>
                    <button type="submit" class="btn btn-success mx-1">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
