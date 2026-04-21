@extends('layouts.admin')
@section('content')
    @include('admin.sitebar')
    @section('title')
        800M Natijalar
    @endsection
    <div class="main-content content">
        <!-- valedate start -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- valedate end -->


        <section class="results-list-section">

            <div class="show_res">
                <h2>800M Natijalar Ro'yxati</h2>
                <div class="search-box">
                    <input type="text" id="admin-search" placeholder="Ism yoki familiya bo'yicha qidiruv...">
                </div>
                <a class="btn-add-new" href="{{ route('admin.sakkizyuzm.create') }}">Qo'shish</a>
            </div>
            <div class="table-responsive">
                <table class="admin-table">
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
                    <tbody id="results-tbody">
                        </tr>
                        @foreach ($sakkizyuzm as $key => $sakkizyuzms)
                            <tr>
                                {{-- Reyting tartib raqami --}}
                                <td data-label="#">{{ $sakkizyuzm->firstItem() + $key }}</td>

                                <td data-label="Ism">{{ $sakkizyuzms->name }}</td>

                                <td data-label="Familya">{{ $sakkizyuzms->family_name }}</td>

                                <td data-label="Otasining Ismi">{{ $sakkizyuzms->middle_name }}</td>

                                <td data-label="Yo'nalish">{{ $sakkizyuzms->orientation }}</td>

                                <td data-label="Guruh">{{ $sakkizyuzms->group }}</td>

                                <td data-label="Jinsi">
                                    {{ $sakkizyuzms->gender == 'male' ? "O'g'il bola" : "Qiz bola" }}
                                </td>

                                <td data-label="Natija">{{ $sakkizyuzms->result }}</td>

                                <td data-label="Harakatlar" class="action-btns" id="Harakatlar">

                                    <a class="btn-action btn-edit" href="{{ route('admin.sakkizyuzm.edit', $sakkizyuzms->id) }}">
                                        O'zgartirish <i class="fas fa-edit"></i>
                                    </a>

                                    <form style="display: inline" action="{{ route('admin.sakkizyuzm.destroy', $sakkizyuzms->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-action btn-delete" title="O'chirish"
                                            onclick="return confirm('Haqiqatan ham uni o\'chirib tashlamoqchimisiz?')">
                                            O'chirish <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                    <tbody id="results-tbody">
                    </tbody>
                </table>
            </div>
        </section>
        <!-- paginate -->
        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0 justify-content-end">
                    <li class="page-item">
                        {{ $sakkizyuzm->links() }}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection