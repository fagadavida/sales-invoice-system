<!DOCTYPE html>
<html>
<head>
    <title>POS</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>
<body>

 <!-- Mobile Sidebar Menu Button -->

  <div class="main-wrapper">


  <aside class="sidebar" >
    <nav class="sidebar-nav">
      <!-- Primary Top Nav -->
      <ul class="nav-list primary-nav">
        <li class="nav-item">
          <a href="{{ route('/')}}" class="nav-link">
            <img src="images/home.PNG" width="20"/>
            <li class="nav-item"><a class="nav-link dropdown-title">Dashboard</a></li>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('products.index')}}" class="nav-link">
            <i class="bx bx-shopping-bag"></i>
            <span class="nav-label">Products</span>
          </a>

        </li>

        <li class="nav-item">
          <a href="{{ route('customers.index')}}" class="nav-link">
            <i class="bx bx-group"></i>
            <span class="nav-label">Customers</span>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('sales.index')}}" class="nav-link">

                <i class="bx bx-cart"></i>
              <span class="nav-label">Sales</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('invoices.index')}}" class="nav-link">
                <i class="bx bx-credit-card"></i>
              <span class="nav-label">Invoices</span>
            </a>
          </li>
      </ul>

      </ul>
    </nav>
  </aside>

    <div class="container" style="display:flex; flex: 6; margin: 0; padding: 0; flex-direction: column;">
        <nav style="background: #1C5E55; color: #FFF;display:flex;align-items:center;justify-content:space-between">
            <div class="icon nav-icon-5">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <aside>
                <img src="/images/admin.png" style="width:40px"/>
              </aside>
        </nav>

        @yield('content')
    </div>
</div>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
