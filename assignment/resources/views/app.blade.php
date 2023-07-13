<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fs-4 fw-bolder" href="#">News24.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav ms-auto fs-4 fw-bolder">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/home')}}">News</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <div class="content mt-5">
    @yield('content')
  </div>
  <script src="{{asset("js/bootstrap.bundle.js")}}"></script>
  
</body>
</html>