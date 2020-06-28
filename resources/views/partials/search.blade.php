<form action="{{ route('profiles.search') }}" class="d-flex mr-3">
    @csrf
    <div class="form-group">
        <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}" placeholder="Find User">
    </div>
        <button type="submit" class="btn btn-info">
            <i class="fa fa-search" aria-hidden="true"></i>
    </button>
</form>