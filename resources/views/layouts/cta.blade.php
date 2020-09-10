<ul class="list-unstyled CTAs">
    @auth
    <li>
        {{ Auth::user()->name }}
        {{-- <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a> --}}
    </li>
    <li>
        <a class="download" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        {{-- <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a> --}}
    </li>
    @endauth
</ul>