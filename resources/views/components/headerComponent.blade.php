@if (Route::has('login'))
<div class="container">
    <div class="row  p-5 ">
        <img src="resources/views/assets/Jumba_logo_rgb-01.png" class="col-md-8">
        @auth
            <a href="{{ url('./dashboard') }}" class="col btn btn-sm btn-outline-secondary me-4">Dashboard</a>
        @else
            <div class="col-md-4">
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary me-4 ">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-success ">Register</a>
                @endif
            </div>
        @endauth
    </div>
</div>
@endif