<!DOCTYPE html>
<html lang="uz">
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('./image/image.png') }}">
    <link rel="stylesheet" href="{{ asset('./assets/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <header class="admin-header">
        <div class="header-logo">
            <i class="fas fa-running"></i> <b>GDPI</b> Admin
        </div>
        <div class="header-user">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <span>Chiqish!</span>
                <button id="logout-btn" title="Chiqish"><i class="fas fa-sign-out-alt"></i></button>
            </form>
        </div>
    </header>

    @yield('content')

    </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->
</html>