<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd; margin-bottom: 1.5rem;">
  <a class="navbar-brand" href="/">MLM PhotoShow</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{Request::is('/') ? 'active' : ''}}{{Request::is('albums') ? 'active' : ''}}">
        <a class="nav-link" href="/albums">Albums</a>
      </li>
      <li class="nav-item {{Request::is('albums/create') ? 'active' : ''}}">
        <a class="nav-link" href="/albums/create">Create Album</a>
      </li>
    </ul>
  </div>
</nav>
