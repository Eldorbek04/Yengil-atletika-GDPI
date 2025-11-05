@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        1500m
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
                1500m
            </h1>
            <table>
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
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->