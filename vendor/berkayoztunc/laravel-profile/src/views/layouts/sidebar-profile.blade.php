<ul class="list-group">
    <a href="/profile" class="list-group-item ">{{ trans('profileLang::profile.sidebar.account') }}</a>
    <a href="/profile/information" class="list-group-item">{{ trans('profileLang::profile.sidebar.information') }}</a>
    {{-- @if(config()->get('profile.activity'))
    <a href="/profile/activity" class="list-group-item">{{ trans('profileLang::profile.sidebar.activity') }}</a>
    @endif --}}
    <a href="/cart" class="list-group-item">{{ trans('profileLang::profile.sidebar.yourbasket') }}</a>

    <a href="{{ route('logout') }}"
       class="list-group-item"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        {{ trans('profileLang::profile.sidebar.logout') }}
    </a>

</ul>