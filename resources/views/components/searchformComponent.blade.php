<div class="card">
    <div class="card-header">
        Zoek woning
    </div>
    <div class="card-body">
        {{-- @if (Session::has('woning-updated')) 
            <div class="alert alert-succes" role="alert">{{Session::get('woning-updated')}}</div>
        @endif --}}
        
            {{-- <livewire:suggest /> --}}
        <form method=POST action="{{route('homepage.searchdetails')}}">
            @csrf <!-- toevoeging nodig om sessie te behouden -->
        
            <div class="form-floating">
            <span class="input-group-text" id="addon-wrapping">plaats</span>
            <input type="text" class="form-control" id="plaats" name="plaats">
            <span class="input-group-text" id="addon-wrapping">Straat</span>
            <input type="text" class="form-control" id="straat" name="straat">
            <span class="input-group-text" id="addon-wrapping">Nummer</span>
            <input type="text" class="form-control" id="nr" name="nr">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Search</button>

            {{-- @error('straat')
                <span class="text-danger">{{$message}}</span>
            @enderror --}}
            </div>
        </form>
    </div>
</div>