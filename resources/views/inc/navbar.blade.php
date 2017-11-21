<nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">TodoList</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
			@if(Auth::check())
				<li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
               <li class="{{Request::is('todo/create') ? 'active' : ''}}"><a href="{{URL::to('/todo/create')}}">Create Todo</a></li>
			  <li class="pull-right"><a>Welcome {{ Auth::user()->name}}</a></li>
			  <li class="pull-right"><a href="{{URL::to('/logout')}}">Logout</a></li>
            @else
					 <li class="pull-right"><a href="{{URL::to('/login')}}">Login</a></li>
				  <li class="pull-right"><a  href="{{URL::to('/register')}}">register</a></li>
				 
            @endif
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
