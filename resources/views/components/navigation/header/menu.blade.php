<!-- BEGIN menu -->
<div class="menu">
    <div class="menu-item dropdown dropdown-mobile-full">
        <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link d-flex align-items-center">
            <div class="menu-img online me-sm-2 ms-lg-0 ms-n2">
                <img src="{{ asset('assets/img/user/profile.jpg') }}" alt="Profile" class=""/>
            </div>
            <div class="menu-text d-sm-block d-none">
                    <span class="d-block"><span><span
                                class="__cf_email__">[{{ Auth::user()->name }}]</span></span></span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-10px fade">
            <h6 class="dropdown-header">МЕНЮ ПОЛЬЗОВАТЕЛЯ</h6>
            <a class="dropdown-item" href="{{ route('settings.edit') }}">НАСТРОЙКИ</a>
            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();">ВЫХОД</a>
            </form>
        </div>
    </div>
</div>
<!-- END menu -->
