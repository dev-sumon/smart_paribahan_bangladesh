<div class="content_nav">
    <div class="nav1">
        <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
            <li><a href="{{ route('f.home.standIntro', $stand->id) }}" class="active-link {{ $page_slug == 'intro' ? 'active' : '' }}">{{ __('Stand Introduction') }}</a></li>
            <li><a href="{{ route('f.home.stand', $stand->id) }}" class="active-link {{ $page_slug == 'map' ? 'active' : '' }}">{{ __('Stand on Map') }}</a></li>
            <li><a href="{{ route('f.home.standCommitee', $stand->id) }}" class="active-link {{ $page_slug == 'commitee' ? 'active' : '' }}">{{ __('List of President and Members') }}</a></li>
            <li><a href="{{ route('f.home.standOwner', $stand->id) }}" class="active-link {{ $page_slug == 'owner' ? 'active' : '' }}">{{ __('List of Owners') }}</a></li>
        </ul>
    </div>
    <div class="nav2 pt-4">
        <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
            <li><a href="{{ route('f.home.standDriver', $stand->id) }}" class="active-link {{ $page_slug == 'driver' ? 'active' : '' }}">{{ __('List of Drivers') }}</a></li>
            <li><a href="{{ route('f.home.standNotice', $stand->id) }}" class="active-link {{ $page_slug == 'notice' ? 'active' : '' }}">{{ __('Annual Budget, Development Plan & Financial Statement of Stand') }}</a></li>
        </ul>
    </div>
</div>