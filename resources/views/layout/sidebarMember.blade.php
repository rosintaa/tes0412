      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          </li>
          <li class="nav-item">
            <a href="{{ url('/member') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
               Data Member
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/data/json') }}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Member JSON
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/logout') }}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
        </ul>
      </nav>