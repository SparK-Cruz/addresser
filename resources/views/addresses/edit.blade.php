@extends('layouts.admin')

@section('title', 'Update Address')

@section('content')
    <div>
        <h1>Update Address</h1>
    </div>
    @include('partials.messages')
    @include('partials.errors')

    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @method('PATCH')
        @csrf
        @include('addresses.form')
        <button type="submit">Save Address</button>
    </form>

@endsection
