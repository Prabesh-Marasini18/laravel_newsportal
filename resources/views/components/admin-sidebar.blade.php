<aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Prabesh Hub</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>


             <li class="dropdown {{ request()->routeIs('admin.company.*') ? 'active' : '' }}">
              <a href="{{ route('admin.company.index') }}" class="nav-link"><i data-feather="briefcase"></i><span>Company</span></a>
            </li>

             <li class="dropdown {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
              <a href="{{ route('admin.category.index') }}" class="nav-link"><i data-feather="tag"></i><span>Category</span></a>
            </li>

             <li class="dropdown {{ request()->routeIs('admin.article.*') ? 'active' : '' }}">
              <a href="{{ route('admin.article.index') }}" class="nav-link"><i data-feather="book"></i><span>Article</span></a>
            </li>



          </ul>
        </aside>
