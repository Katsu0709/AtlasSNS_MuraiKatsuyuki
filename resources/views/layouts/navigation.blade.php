<div id="head">
    <h1><a href="{{ route('top')}}">
            <img src="{{ asset('images/atlas.png') }}">
        </a></h1>
    <div id="menu-container">
        <div id="menu-title">
            <p>{{ Auth::user()->username }} さん</p>
            <span class="arrow"></span>
        </div>
        <ul>
            <li><a href="{{ url('/top') }}">HOME</a></li>
            <li><a href="{{ url('/profile') }}">プロフィール編集</a></li>
            <li><a href="{{ url('/logout') }}">ログアウト</a></li>
        </ul>
    </div>
</div>
