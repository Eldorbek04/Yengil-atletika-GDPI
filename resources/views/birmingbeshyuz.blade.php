@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        1500m
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">1500m Natijalari</h1>

            <div class="filter-buttons"
                style="margin-bottom: 25px; display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                {{-- Hammasi --}}
                <a href="{{ request()->url() }}" class="btn-action {{ !request('gender') ? 'active-filter' : '' }}"
                    style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: 0.3s;">
                    Hammasi
                </a>

                {{-- O'g'il bolalar --}}
                <a href="{{ request()->url() . '?gender=male' }}"
                    class="btn-action {{ request('gender') == 'male' ? 'active-filter' : '' }}"
                    style="background-color: #4f46e5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: 0.3s;">
                    O'g'il bolalar ♂
                </a>

                {{-- Qiz bolalar --}}
                <a href="{{ request()->url() . '?gender=female' }}"
                    class="btn-action {{ request('gender') == 'female' ? 'active-filter' : '' }}"
                    style="background-color: #ec4899; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: 0.3s;">
                    Qiz bolalar ♀
                </a>
            </div>

            <div class="table-responsive">
                <table class="results-table">
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>@lang('words.ism')</th>
                            <th>@lang('words.familya')</th>
                            <th>@lang('words.otasiniismi')</th>
                            <th>@lang('words.yonalishi')</th>
                            <th>@lang('words.gurux')</th>
                            <th>@lang('words.natija')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($birmingbeshyuzm as $key => $birmingbeshyuzms)
                            <tr>
                                <td data-label="#">{{ $birmingbeshyuzm->firstItem() + $key }}</td>

                                <td data-label="@lang('words.ism')">{{ $birmingbeshyuzms->name }}</td>

                                <td data-label="@lang('words.familya')">{{ $birmingbeshyuzms->family_name }}</td>

                                <td data-label="@lang('words.otasiniismi')">{{ $birmingbeshyuzms->middle_name }}</td>

                                <td data-label="@lang('words.yonalishi')">{{ $birmingbeshyuzms->orientation }}</td>

                                <td data-label="@lang('words.gurux')">{{ $birmingbeshyuzms->group }}</td>

                                <td data-label="@lang('words.natija')">{{ $birmingbeshyuzms->result }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="card-footer text-center" style="margin-top: 10px;">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0 justify-content-center">
                            <li class="page-item">
                                {{ $birmingbeshyuzm->links() }}
                            </li>
                        </ul>
                    </nav>
                </div>
    </section>
    <style>
        .active-filter {
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2), inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transform: translateY(2px);
            opacity: 0.9;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->