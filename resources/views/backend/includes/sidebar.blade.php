<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('public/backend/assets/img/AdminLTELogo.png') }}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">RadioElectric</span>
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
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-header">Products Setup</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-box-seam"></i>
                    <p>
                        Products
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index'); }}" class="nav-link">
                                <i class="nav-icon bi bi-card-list"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.offers.index'); }}" class="nav-link">
                                <i class="nav-icon bi bi-card-list"></i>
                                <p>Offer Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index'); }}" class="nav-link">
                                <i class="nav-icon bi bi-tags"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brands.index'); }}" class="nav-link">
                                <i class="nav-icon bi bi-award"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="nav-header">Client Area</li> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-bag-check"></i>
                    <p>
                        Orders
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.all_order') }}" class="nav-link">
                            <i class="nav-icon bi bi-list-check"></i>
                            <p>All orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order_pending') }}" class="nav-link">
                            <i class="nav-icon bi bi-hourglass-split"></i>
                            <p>Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order_delivered') }}" class="nav-link">
                            <i class="nav-icon bi bi-truck"></i>
                            <p>Delivered</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.customer'); }}" class="nav-link">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Customers</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.contact-us'); }}" class="nav-link">
                        <i class="nav-icon bi bi-envelope-fill"></i>
                        <p>Contact Message</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route('admin.newsletter'); }}" class="nav-link">
                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>NewsLetter</p>
                    </a>
                </li> 
                <li class="nav-header">Basic Setup</li> 
                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index'); }}" class="nav-link">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Slider</p>
                    </a>
                </li> 
                @role('admin')
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link">
                    <i class="nav-icon bi bi-person-badge-fill"></i>
                    <p>Users</p>
                    </a>
                </li> 
                @endrole
                <li class="nav-item">
                    <a href="{{ route('admin.general-settings.edit'); }}" class="nav-link">
                        <i class="nav-icon bi bi-person-badge-fill"></i>
                        <p>General Settings</p>
                    </a>
                </li> 
            </ul>  
          </nav>
        </div>
      </aside>