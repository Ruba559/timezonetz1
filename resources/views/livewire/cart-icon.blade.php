<div>
    <a class="nav-link" href="{{ route('cart') }}"><span
            class="fa fa-shopping-bag position-relative {{ $bottom == true ? 'fa-2x' : '' }}">
            @auth()
            @if($count > 0)
                <span class='badge badge-sm badge  badge-primary'
                    style="position: absolute;top:5px;left:10px;padding:4px;font-size:.7rem" id='lblCartCount'>

                    {{ $count }}
                </span>
                @endif
            @endauth
            @guest
                @if (session()->has('cart') && count(session('cart')) > 0)
                    <span class='badge badge-sm badge  badge-primary'
                        style="position: absolute;top:5px;left:10px;padding:4px;font-size:.7rem" id='lblCartCount'>

                        {{count(session('cart'))}}
                    </span>
                @endif
            @endguest
        </span></a>
</div>
