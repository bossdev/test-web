<div class="navBar">
    <ul style="position:relative;">
        <li><a href="{{ url('') }}">Home</a></li>
        <li><a href="{{ url('product') }}">Product</a></li>
        <li><a href="#">User</a></li>
        @if(Auth::user())
        <li style="position:absolute; right:0;"><a href="{{ url('user/logout') }}">Logout</a></li>
        @else
            <li style="position:absolute; right:0;"><a href="{{ url('user/login') }}">Login</a></li>
        @endif
    </ul>
</div>