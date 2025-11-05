<html lang="en"><!--  26 Oktyabir 2025 Rayimjonov Eldorbek --><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Panel</title>
  <link rel="icon" type="image/png" href="{{ asset('./image/image.png') }}">
  <link rel="stylesheet" href="{{ asset('./css/login.css') }}">
</head>

<body class="light light-sidebar theme-white">
  <div class="loader" style="display: none;"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                  <h1>Admin panel</h1>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group">
                    <label for="email" :value="__('Email')">Email</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                    <div class="invalid-feedback" :messages="$errors->get('email')">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password">
                    <div class="invalid-feedback" :messages="$errors->get('password')">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 </body><!--  26 Oktyabir 2025 Rayimjonov Eldorbek --></html>
