@extends('layouts.admin')

@section('title', 'New Address')

@section('content')
    <div>
        <h1>New Address</h1>
    </div>
    @include('partials.messages')
    @include('partials.errors')

    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf
        @include('addresses.form')
        <button type="submit">Save Address</button>
    </form>

@endsection
