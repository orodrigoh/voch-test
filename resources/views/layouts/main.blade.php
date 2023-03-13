<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @vite(['resources/scss/app.scss'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
</head>
<body>
    <header class="top-bar">
        <div class="container">
            <div class="wrap-content">
                <a href="" class="logo">
                    <img src="{{ asset('images/logo-voch.svg') }}" alt="Logo">
                </a>
                <nav>
                    <a href="/funcionarios">Funcionários</a>
                    <a href="/unidades">Unidades</a>
                    <a href="/" class="btn-main">Cadastro</a>
                </nav>

            </div>

        </div>

    </header>

    <main>

        <aside>

        </aside>
        <div class="content">
            @yield('content')

        </div>

    </main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.2.0/vanilla-masker.min.js" integrity="sha512-RbMQw6xKGymv6bRMO4z5OxHBzzem7BPEQX7nTJC9G08A70gXdUka76Rvgey83MsSXrIEJddog0vxUKN6iTce2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

@vite(['resources/js/app.js'])

</body>
</html>
