<nav class="navbar navbar-dark sticky-top bg-dark navbar-expand-lg">
    <a class="navbar-brand" href="/">Affiliate Marketing</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarScroll">
        <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
          </li>
        </ul>
        
        <ul class="my-0 mr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Storage::url(Auth::user()->image) }}" class="user-img" alt="user img">
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">Sign out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
  </nav>