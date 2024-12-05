 

 <ul class="list-inline dashboard-menu text-center">
    <li><a class="{{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{route('dashboard')}}">Dashboard</a></li>
    <!-- <li><a class="{{ (request()->is('sell-item')) ? 'active' : '' }}" href="order.html">Sell</a></li> -->
    <li><a href="{{route('my.adverts')}}" class="{{ (request()->is('my-adverts')) ? 'active' : '' }}">My Adverts</a></li>
    <li><a href="{{route('profile.index')}}" class="{{ (request()->is('my-profile')) ? 'active' : '' }}">Profile</a></li>
</ul>