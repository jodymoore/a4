<div id="title"> 
    <div id="header-controls" class="col-xs-4"> 
            <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav navbar-left">
          <!-- Authentication Links -->
          @if (Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
             
              <li><a href="{{ route('register') }}">Register</a></li>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  
                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                      <li>
                          <a href="/edit/{{ Auth::user()->id }}"
                              onclick="event.preventDefault();
                                       document.getElementById('edit-form').submit();">
                              Edit
                          </a>

                          <form id="edit-form" action="/edit/{{ Auth::user()->id }}" method="get" >
                              
                          </form>
                      </li>
                  </ul>
              </li>
          @endif
      </ul>    

    </div>

    <h1>Quik Pizza</h1> 
  
      <div id="checkout" class="col-xs-4"> 
         
         @if(!Cart::isEmpty())

             <div id="total">
                 Total: ${{$total = Cart::getTotal()}} 
             </div>  
         @endif
          
          <ul class="nav navbar-nav navbar-right">
              <li><a href="/order">CHECK OUT</a></li>
          </ul>
              @if(Session::get('message') != null)
        <div class="message">
            {{ Session::get('message')}}
        </div>
    @endif
     </div>

</div>
  @include('nav')