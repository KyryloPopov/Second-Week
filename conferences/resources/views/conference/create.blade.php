@extends('layouts.app')
@section('content')
    <div class="pb-3">
        <h1>Conference creating</h1>
    </div>
    <div class="px-5 w-75">
        <form action="{{route('conference.store')}}" method="POST">
            @csrf
            <h3>Title</h3>
            <p><input value="{{old('title')}}" type="text" name="title" class="form-control"></p>
            @error('title') <p class="text-danger">{{$message}}</p> @enderror
            <h3>Date</h3>
            <p><input value="{{old('title')}}" type="date" name="date" class="form-control"></p>
            @error('date') <p class="text-danger">{{$message}}</p> @enderror
            <h3>Address:</h3>
            <div id="maps"></div>
            <p>Latitude: <input type="text" name="latitude" value="{{old('latitude')}}" class="form-control"></p>
            @error('latitude') <p class="text-danger">{{$message}}</p> @enderror
            <p>Longitude: <input type="text" name="longitude" value="{{old('longitude')}}" class="form-control"></p>
            @error('longitude') <p class="text-danger">{{$message}}</p> @enderror
            <h3>Country</h3>
            <p><select name="country_id" class="form-select">
                    <option>Select country</option>
                    @foreach($countries as $country)
                        <option {{$country->id == old('country_id') ? ' selected ' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach ($countries as $country) : ?>
                </select>
            </p>
            @error('country_id') <p class="text-danger">{{$message}}</p> @enderror
            <div>
                <a href="{{route('conference.index')}}" class="btn btn-secondary"><b>Back</b></a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
