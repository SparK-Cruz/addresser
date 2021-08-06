@extends('layouts.admin')

@section('title', 'Address Info')

@section('content')
    <div>
        <h1>Address Info</h1>
    </div>
    @include('partials.messages')

    <p>Zip Code: {{ $address->zip_code }}</p>
    <p>Address: {{ $address->address }}</p>
    <p>City: {{ $address->city }}</p>
    <p>State: {{ $address->state }}</p>
    <p>Neighborhood: {{ $address->neighborhood }}</p>

@endsection
