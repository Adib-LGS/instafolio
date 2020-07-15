    <form action="{{ route('profiles.search') }}" class="form-inline d-flex">
        @csrf
            <input type="text" name="q" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" value="{{ request()->q ?? '' }}" placeholder="Find User" id="q">
        <button type="submit" class="btn btn-primary mx-auto">
                <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </form>