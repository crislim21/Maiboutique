<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">MaiBoutique</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Posts") ? 'active' : '' }}" aria-current="page" href="/posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Category") ? 'active' : '' }}" aria-current="page" href="/categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Search") ? 'active' : '' }}" href="/search">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Cart") ? 'active' : '' }}" href="#">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "History") ? 'active' : '' }}" href="#">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Profile") ? 'active' : '' }}" href="/profile">Profile</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
        @auth
        @can('admin')
        <a href="/dashboard/posts/create" class="text-decoration-none btn border-primary text-primary">Add Item</a>
        @endcan
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard/posts"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i> Log Out
                    </button>
                </form>
              </li>
            </ul>
        </li>
        @else
            <a href="/login" class="btn border rounded text-primary"><i class="bi bi-box-arrow-in-right"></i>  Sign Up</a>
        @endauth
        </ul>


      </div>
    </div>
  </nav>
