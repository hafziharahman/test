<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOFGallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light px-5 shadow-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{ asset('assets/images-removebg-preview.png') }}" height="50" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-uppercase" aria-current="page" href="/page"><b>Beranda</b></a>
              </li>
            </ul>
            <ul>
                {{-- <form class="d-flex mt-1" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form> --}}
            </ul>
            </ul>
            <div class="dropdown">
                <button class="btn btn-light" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/3.png') }}" class="me-2" height="50" width="50" style="margin-top: -10px; margin=: -10px;" alt="">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="/show">Upload Data</a></li>
                    <li><a class="dropdown-item" href="/data_saya">Data Saya</a></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </div>

          </div>
        </div>
      </nav>

@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
