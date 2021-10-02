<!-- main-sidebar -->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
      <a class="desktop-logo logo-light active" href="{{ url('/' . $page='admin') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
      <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='admin') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
      <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='admin') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
      <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='admin') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
      <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
          <div class="">
            <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
          </div>
          <div class="user-info">
            <h4 class="font-weight-semibold mt-3 mb-0">Petey Cruiser</h4>
            <span class="mb-0 text-muted">Premium Member</span>
          </div>
        </div>
      </div>
      <ul class="side-menu">
        <li class="side-item side-item-category">General</li>
        <!-- <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h15v3H5zm12 5h3v9h-3zm-7 0h5v9h-5zm-5 0h3v9H5z" opacity=".3"/><path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM8 19H5v-9h3v9zm7 0h-5v-9h5v9zm5 0h-3v-9h3v9zm0-11H5V5h15v3z"/></svg><span class="side-menu__label">Admins</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="">Show All Admins</a></li>
            <li><a class="slide-item" href="">Create New Admin</a></li>
          </ul>
        </li> -->
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/><path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/></svg><span class="side-menu__label">About US</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="{{ route('about.index') }}">Show About Us</a></li>
            <li><a class="slide-item" href="{{ route('about.create') }}">Create New About</a></li>
          </ul>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">Contacts</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="{{ route('contact.index') }}">Show All Contacts</a></li>
          </ul>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/></svg><span class="side-menu__label">Information</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="{{route('information.index')}}">Show All Information</a></li>
            <li><a class="slide-item" href="{{route('information.create')}}">Create New Information</a></li>
          </ul>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z" opacity=".3"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg><span class="side-menu__label">Chefs</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="{{ route('chefs.index') }}">Show All Chefs</a></li>
            <li><a class="slide-item" href="{{ route('chefs.create') }}">Create New Chef</a></li>
          </ul>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z" opacity=".3"/><path d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"/></svg><span class="side-menu__label">Categories</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="{{ route('category.index') }}">Show All Categories</a></li>
            <li><a class="slide-item" href="{{ route('category.create') }}">Create New Category</a></li>
          </ul>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"/><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/></svg><span class="side-menu__label">Items</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="{{ route('item.index') }}">Show All Items</a></li>
            <li><a class="slide-item" href="{{ route('item.create') }}">Create New Item</a></li>
          </ul>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">Galleries</span><i class="angle fe fe-chevron-down"></i></a>
          <ul class="slide-menu">
            <li><a class="slide-item" href="{{ route('gallery.index') }}">Show All Galleries</a></li>
            <li><a class="slide-item" href="{{ route('gallery.create') }}">Create New Gallery</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
<!-- main-sidebar -->
