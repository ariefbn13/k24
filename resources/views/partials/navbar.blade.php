<nav class="navbar navbar-expand-lg bg-body-tertiary">
  

    <div class="container-fluid">
      <a class="navbar-brand">Member</a>

      @auth
      <ul class="navbar-nav ms-auto">
        
          <span class="navbar-text">
            Welcome {{ auth()->user()->username }}
          </span>
        
        <li class="nav-item ms-3">
          <form action="/logout" method="post" class="ml-3">
            @csrf
            <button type="submit" class="btn btn-light">Logout</button>
          </form>
        </li>
      </ul>
      @endauth
    </div>
    
     
  </nav>