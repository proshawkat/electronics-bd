<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('public/backend/assets/img/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-header">Products Setup</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam-fill"></i>
                    <p>
                        Products
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index'); }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index'); }}" class="nav-link">
                                <i class="nav-icon bi bi-palette"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brands.index'); }}" class="nav-link">
                                <i class="nav-icon bi bi-palette"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="nav-header">Client Area</li> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam-fill"></i>
                    <p>
                        Orders
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./widgets/small-box.html" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>All orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./generate/theme.html" class="nav-link">
                            <i class="nav-icon bi bi-palette"></i>
                            <p>Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./generate/theme.html" class="nav-link">
                            <i class="nav-icon bi bi-palette"></i>
                            <p>Delivered</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Customers</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Contact Message</p>
                    </a>
                </li> 
                <li class="nav-header">Basic Setup</li> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-circle-fill"></i>
                    <p>Users</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-circle-fill"></i>
                    <p>General Settings</p>
                    </a>
                </li> 
            </ul>  
          </nav>
        </div>
      </aside>