@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Map</h4>
        <form action="{{route('customers.profile.map.store', ['id' => $customer->id])}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-12 mx-1">
                            <label for="latitude">Latitude (Google Maps)</label>
                            <div class="input-group my-2">
                                <input type="text" class="form-control" name="latitude" id="latitude"> <span class="input-group-text"><i class='bx bxl-google'></i></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-12 mx-1">
                            <label for="longitude">Longitude (Google Maps)</label>
                            <div class="input-group my-2">
                                <input type="text" class="form-control"  name="longitude" id="longitude">
                            </div>
                        </div>
                        <div class="col-md-2 col-12 mx-1 text-center">
                            <button type="submit" class="btn btn-primary mt-4">Submit </button>
                        </div>
                        <div class="col-md-3 col-12 mx-1">
                            <a href="" type="button" class="btn btn-secondary mt-4 " id="openmap">Open in google map</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title py-3">Current Location Submitted</h5>
                <div class="row">
                    <div class="col-md-6">
                            <label for="latitude">Latitude (Google Maps)</label>
                            <div class="input-group my-2">
                            <input type="text" class="form-control" value="{{ $customer->latitude }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="longitude">Longitude (Google Maps)</label>
                            <div class="input-group my-2">
                                <input type="text" class="form-control"  value="{{$customer->longitude  }}">
                            </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>

</div>



@endsection
