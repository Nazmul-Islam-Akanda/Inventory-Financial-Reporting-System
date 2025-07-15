      <div class="sidebar py-3" id="sidebar">
        <h6 class="sidebar-heading">Main</h6>
        <ul class="list-unstyled">
              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'admin.')? 'active': '' }}" href="#" data-bs-target="#dashboardsDropdown" role="button" aria-expanded="{{ str_starts_with(request()->route()->getName(),'admin.')? 'true': 'false' }}" data-bs-toggle="collapse"> 
                      <i class="fa-solid fa-house"></i>
                      <span class="sidebar-link-title">Dashboards </span></a>
                <ul class="sidebar-menu list-unstyled {{ str_starts_with(request()->route()->getName(),'admin.')? 'collapse show': 'collapse' }}" id="dashboardsDropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link {{ str_starts_with(request()->route()->getName(),'admin.')? 'active': '' }} text-muted" href="{{ route('admin.dashboard') }}">Default</a></li>
                </ul>
              </li>

              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'product.')? 'active': '' }}" href="#" data-bs-target="#e-inventorydropdown" role="button" aria-expanded="{{ str_starts_with(request()->route()->getName(),'product.')? 'true': 'false' }}" data-bs-toggle="collapse"> 
                      <i class="fa-solid fa-shop"></i>
                      <span class="sidebar-link-title">Inventory </span></a>
                <ul class="sidebar-menu list-unstyled {{ str_starts_with(request()->route()->getName(),'product.')? 'collapse show': 'collapse' }}" id="e-inventorydropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'product.create')? 'active': '' }}" href="{{ route('product.create') }}">Products - New</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'product.list')? 'active': '' }}" href="{{ route('product.list') }}">Products</a></li>
                </ul>
              </li>

              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'order.')? 'active': '' }}" href="#" data-bs-target="#e-salesdropdown" role="button" aria-expanded="{{ str_starts_with(request()->route()->getName(),'order.')? 'true': 'false' }}" data-bs-toggle="collapse"> 
                <i class="fa-solid fa-money-bill"></i>
                <span class="sidebar-link-title">Sales </span></a>
                <ul class="sidebar-menu list-unstyled {{ str_starts_with(request()->route()->getName(),'order.')? 'collapse show': 'collapse' }}" id="e-salesdropdown">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'order.create')? 'active': '' }}" href="{{ route('order.create') }}">Order - New</a></li>
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'order.list')? 'active': '' }}" href="{{ route('order.list') }}">Orders</a></li>
                </ul>
              </li>

              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'journal.')? 'active': '' }}" href="#" data-bs-target="#e-journal" role="button" aria-expanded="{{ str_starts_with(request()->route()->getName(),'journal.')? 'true': 'false' }}" data-bs-toggle="collapse"> 
                <i class="fa-solid fa-newspaper"></i>
                <span class="sidebar-link-title">Journal </span></a>
                <ul class="sidebar-menu list-unstyled {{ str_starts_with(request()->route()->getName(),'journal.')? 'collapse show': 'collapse' }}" id="e-journal">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'journal.ledger')? 'active': '' }}" href="{{ route('journal.ledger') }}">Ledger</a></li>
                </ul>
              </li>

              <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'report.')? 'active': '' }}" href="#" data-bs-target="#e-report" role="button" aria-expanded="{{ str_starts_with(request()->route()->getName(),'report.')? 'true': 'false' }}" data-bs-toggle="collapse"> 
                <i class="fa-solid fa-calendar"></i>
                <span class="sidebar-link-title">Financial Report </span></a>
                <ul class="sidebar-menu list-unstyled {{ str_starts_with(request()->route()->getName(),'report.')? 'collapse show': 'collapse' }}" id="e-report">
                  <li class="sidebar-list-item"><a class="sidebar-link text-muted {{ str_starts_with(request()->route()->getName(),'report.generate')? 'active': '' }}" href="{{ route('report.generate') }}">Generate Report</a></li>
                </ul>
              </li>

        </ul>
      </div>