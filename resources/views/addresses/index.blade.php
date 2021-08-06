@extends('layouts.admin')

@section('title', 'Address List')

@section('content')
    <div>
        <h1>Addresses</h1>
        <a href="{{ route('addresses.create') }}">New address</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="success-message">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table>
        <tr>
            <th>Zip Code</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Neighborhood</th>
            <th>Actions</th>
        </tr>
        @foreach ($addresses as $address)
            <tr>
                <td>{{ $address->zip_code }}</td>
                <td>{{ $address->address }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->state }}</td>
                <td>{{ $address->neighborhood }}</td>
                <td>

                    <a href="{{ route('addresses.show', $address->id) }}">show</a>

                    <a href="{{ route('addresses.edit', $address->id) }}">edit</a>

                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $addresses->links() !!}

@endsection
