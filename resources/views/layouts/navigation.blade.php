<div id="head">
    <h1><a href="{{ route('top')}}">
            <img src="{{ asset('images/atlas.png') }}">
        </a></h1>
    <div id="menu-container">
        <div id="menu-title">
            <p class="m-5">{{ Auth::user()->username }} さん</p>
            <span class="arrow"></span>
            <img src="{{ asset('images/' . (Auth::user()->icon_image ?? 'icon1.png')) }}" class=" user-icon-header">
        </div>
        <ul>
            <li><a href="{{ url('/top') }}">HOME</a></li>
            <li><a href="{{ url('/profile') }}">プロフィール編集</a></li>
            <li><a href="{{ url('/logout') }}">ログアウト</a></li>
        </ul>
    </div>
</div>
