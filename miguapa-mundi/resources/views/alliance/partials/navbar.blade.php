<nav class="d-flex bg-secondary justify-content-center">
    <div class="my-2 mx-4">
        <a class="link-nav2 p-2" href="{{ route('alliance.index') }}">@lang('alliance.partials.aAlliances')</a>
    </div>
    <div class="my-2 mx-4">
        <a class="link-nav2 p-2" href="{{ route('alliance.member') }}">@lang('alliance.partials.aMember')</a>
    </div>
    <div class="my-2 mx-4">
        <a class="link-nav2 p-2" href="{{ route('alliance.moderator') }}">@lang('alliance.partials.aModerator')</a>
    </div>
    <div class="my-2 mx-4">
        <a class="link-nav2 p-2" href="{{ route('alliance.create') }}">@lang('alliance.partials.aNew')</a>
    </div>
</nav>