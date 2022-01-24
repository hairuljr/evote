<div class="s-pageheader">
    <header class="header">
        <div class="header__content row">
            <div class="header__logo">
                <a class="logo" href="{{ route('welcome') }}">
                    <img src="{{ config('ladmin.logo') }}" alt="Beranda">
                </a>
            </div>
            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
            <nav class="header__nav-wrap">
                <ul class="header__nav">
                    <li><a href="{{ route('welcome') }}" title="Beranda">Beranda</a></li>
                    <li class="has-children">
                        <a href="#0" title="">Mata Kuliah</a>
                        <ul class="sub-menu">
                            @forelse ($studies as $item)
                                <li><a href="{{ route('vote'). '?m='.$item->slug }}">{{ $item->name ?? '-' }}</a></li>
                            @empty
                                <li><a href="#">Belum ada</a></li>
                            @endforelse
                        </ul>
                    </li>
                    <li><a href="{{ route('clear') }}" title="Keluar">Logout</a></li>
                </ul>
                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Tutup</a>
            </nav>
        </div>
    </header>
</div>