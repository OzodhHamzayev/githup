<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item mr-4" >
                <form method="post" action="{{ route('logout') }} ">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">chiqish</button>
                </form>
            </li>
            <li class="nav-item mr-4">
                <a class="btn btn-outline-primary" class="navbar-brand" href="{{ route('dashboard') }}">dashboard</a>
            </li>
            <li class="nav-item mr-4">
                <a class="btn btn-outline-primary" class="navbar-brand" href="{{ route('article.index') }}">qatorlar</a>
            </li>
            <li class="nav-item mr-4">
                <a class="btn btn-outline-primary" class="navbar-brand" href="{{ route('article.news') }}">article
                    news</a>
            </li>
        </ul>
    </div>
</nav>
