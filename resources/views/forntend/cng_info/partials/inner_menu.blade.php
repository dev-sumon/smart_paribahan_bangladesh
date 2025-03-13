<div class="content_nav">
    <div class="nav1">
        <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
            <li><a href="{{ route('f.home.standIntro', $stand->id) }}" class="active-link {{ $page_slug == 'intro' ? 'active' : '' }}">{{ __('স্ট্যান্ডের পরিচিতি') }}</a></li>
            <li><a href="{{ route('f.home.stand', $stand->id) }}" class="active-link {{ $page_slug == 'map' ? 'active' : '' }}">{{ __('মানচিত্রে স্ট্যান্ড') }}</a></li>
            <li><a href="{{ route('f.home.standCommitee', $stand->id) }}" class="active-link {{ $page_slug == 'commitee' ? 'active' : '' }}">{{ __('সভাপতি ও সদস্য বৃন্দ তালিকা') }}</a></li>
            <li><a href="{{ route('f.home.standOwner', $stand->id) }}" class="active-link {{ $page_slug == 'owner' ? 'active' : '' }}">{{ __('মালিক এর তালিকা') }}</a></li>
        </ul>
    </div>
    <div class="nav2 pt-4">
        <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
            <li><a href="{{ route('f.home.standDriver', $stand->id) }}" class="active-link {{ $page_slug == 'driver' ? 'active' : '' }}">{{ __('ড্রাইভার এর তালিকা') }}</a></li>
            <li><a href="{{ route('f.home.standNotice', $stand->id) }}" class="active-link {{ $page_slug == 'notice' ? 'active' : '' }}">{{ __('স্ট্যান্ড এর বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী') }}</a></li>
        </ul>
    </div>
</div>