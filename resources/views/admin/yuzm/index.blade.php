@extends('layouts.admin')

@section('title')
    100M Natijalar
@endsection

@section('content')
    @include('admin.sitebar')
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
    <div class="main-content content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="results-list-section">
            <div class="show_res">
                <h2>100M Natijalar Ro'yxati</h2>
                <div class="search-box">
                    <input type="text" id="admin-search" placeholder="Ism yoki familiya bo'yicha qidiruv...">
                </div>
                <a class="btn-add-new" href="{{ route('admin.yuzm.create') }}">Qo'shish</a>
            </div>

            <div class="table-responsive">
                <table class="admin-table" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ism</th>
                            <th>Familya</th>
                            <th>Otasining ismi</th>
                            <th>Yo'nalish</th>
                            <th>Guruh</th>
                            <th>Jinsi</th>
                            <th>Natija</th>
                            <th>Harakatlar</th>
                        </tr>
                    </thead>
                    <tbody id="results-tbody">
                        @foreach ($yuzm as $key => $yuzms)
                            <tr class="result-row">
                                <td data-label="#">{{ $yuzm->firstItem() + $key }}</td>
                                <td data-label="Ism" class="search-name">{{ $yuzms->name }}</td>
                                <td data-label="Familya" class="search-surname">{{ $yuzms->family_name }}</td>
                                <td data-label="Otasining Ismi">{{ $yuzms->middle_name }}</td>
                                <td data-label="Yo'nalish">{{ $yuzms->orientation }}</td>
                                <td data-label="Guruh">{{ $yuzms->group }}</td>
                                <td data-label="Jinsi">
                                    {{ $yuzms->gender == 'male' ? "O'g'il bola" : "Qiz bola" }}
                                </td>
                                <td data-label="Natija">{{ $yuzms->result }}</td>
                                <td data-label="Harakatlar" class="action-btns">
                                    <a class="btn-action btn-edit" href="{{ route('admin.yuzm.edit', $yuzms->id) }}">
                                        <i class="fas fa-edit"></i> O'zgartirish
                                    </a>
                                    <form style="display: inline" action="{{ route('admin.yuzm.destroy', $yuzms->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete"
                                            onclick="return confirm('Haqiqatan ham o\'chirmoqchimisiz?')">
                                            <i class="fas fa-trash-alt"></i> O'chirish
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <div class="card-footer">
            {{ $yuzm->links() }}
        </div>
    </div>

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
@endsection