@if (Route::has('login'))
<div class="hidden p-3 m-0 border-0 gx-10 align-content-lg-end">
    @auth
        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-outline-secondary me-4">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary me-4">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
        @endif
    @endauth
</div>
@endif