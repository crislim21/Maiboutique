<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">
              <span data-feather="home"></span>
              Home
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts') ? 'active': '' }}" href="/dashboard/posts">
            <span data-feather="layers"></span>
            My Product
          </a>
        </li>
        @can('admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts/create') ? 'active': '' }}" href="/dashboard/posts/create">
            <span data-feather="layers"></span>
            Add Item
          </a>
        </li>
        @endcan

      </ul>
    </div>
</nav>
