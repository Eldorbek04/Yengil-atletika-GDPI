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
    <style>
        /* Qidiruv inputi stili */
        .search-box {
            flex: 1;
            margin: 0 20px;
        }

        #admin-search {
            width: 100%;
            max-width: 400px;
            padding: 10px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
        }

        #admin-search:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 10px rgba(74, 144, 226, 0.2);
        }

        /* Table Responsive CSS */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        .admin-table th,
        .admin-table td {
            padding: 12px;
            border: 1px solid #edf2f7;
            text-align: left;
        }

        /* Mobil qurilmalar uchun (Media Query) */
        @media (max-width: 992px) {
            .show_res {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .search-box {
                margin: 0;
            }

            /* Jadvalni kartaga aylantirish */
            .admin-table thead {
                display: none;
                /* Sarlavhalarni yashiramiz */
            }

            .admin-table,
            .admin-table tbody,
            .admin-table tr,
            .admin-table td {
                display: block;
                width: 100%;
            }

            .admin-table tr {
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .admin-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border: none;
                border-bottom: 1px solid #eee;
            }

            .admin-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                font-weight: bold;
                text-align: left;
                color: #4a5568;
            }

            .action-btns {
                text-align: center !important;
                padding-left: 12px !important;
            }
        }
    </style>

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
    <script>
        document.getElementById('admin-search').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('.result-row');

            rows.forEach(row => {
                let name = row.querySelector('.search-name').textContent.toLowerCase();
                let surname = row.querySelector('.search-surname').textContent.toLowerCase();

                if (name.includes(filter) || surname.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->

</html>