


   <a class="{{ (request()->is('dashboard')) ? 'active' : '' }} border p-3" href="{{route('dashboard')}}"><b>Dashboard</b></a>
    <!--<a class="{{ (request()->is('sell-item')) ? 'active' : '' }}" href="order.html">Sell</a> -->
   <a href="{{route('my.adverts')}}" class="{{ (request()->is('my-adverts')) ? 'active' : '' }} border p-3"><b>My Adverts</b></a>
   <a href="{{route('profile.index')}}" class="{{ (request()->is('my-profile')) ? 'active' : '' }} border p-3"><b>Profile</b></a>
