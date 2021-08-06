@extends('layouts.app')

@section('contents')
<form id="search">
    <label>Zip or Address</label>
    <input type="text" id="query" />
    <button type="submit" id="query-btn">Search</button>
</form>
<section id="results">
    <div id="result-template" class="result" style="display: none;">
        <p class="zip_code">Zip Code: <span class="value"></span></p>
        <p class="address">Address: <span class="value"></span></p>
        <p class="city">City: <span class="value"></span></p>
        <p class="state">State: <span class="value"></span></p>
        <p class="neighborhood">Neighborhood: <span class="value"></span></p>
    </div>
</section>
@endsection
