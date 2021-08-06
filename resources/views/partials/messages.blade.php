@if ($message = Session::get('success'))
    <div class="success-message">
        <p>{{ $message }}</p>
    </div>
@endif
