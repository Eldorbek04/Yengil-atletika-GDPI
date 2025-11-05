@extends('layouts.admin')
@section('content')
    @include('admin.sitebar')
    @section('title')
        Uzunlikka sakrash
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
                <h2> Uzunlikka sakrash Natijalar Ro'yxati</h2>
                <a class="btn-add-new" href="{{ route('admin.uzunlikkasakrash.create') }}">Qo'shish</a>
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
                            <th>Natija</th>
                            <th>Harakatlar</th>
                        </tr>
                    <tbody id="results-tbody">
                        </tr>
                        @foreach ($uzunlikkasakrash as $key => $uzunlikkasakrashs)
                            <tr>
                                {{-- Reyting tartib raqami --}}
                                <td data-label="#">{{ $uzunlikkasakrash->firstItem() + $key }}</td>

                                <td data-label="Ism">{{ $uzunlikkasakrashs->name }}</td>

                                <td data-label="Familya">{{ $uzunlikkasakrashs->family_name }}</td>

                                <td data-label="Otasining Ismi">{{ $uzunlikkasakrashs->middle_name }}</td>

                                <td data-label="Yo'nalish">{{ $uzunlikkasakrashs->orientation }}</td>

                                <td data-label="Guruh">{{ $uzunlikkasakrashs->group }}</td>

                                <td data-label="Natija">{{ $uzunlikkasakrashs->result }}</td>

                                <td data-label="Harakatlar" class="action-btns" id="Harakatlar">

                                    <a class="btn-action btn-edit" href="{{ route('admin.uzunlikkasakrash.edit', $uzunlikkasakrashs->id) }}">
                                        O'zgartirish <i class="fas fa-edit"></i>
                                    </a>

                                    <form style="display: inline" action="{{ route('admin.uzunlikkasakrash.destroy', $uzunlikkasakrashs->id) }}"
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
                        {{ $uzunlikkasakrash->links() }}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection