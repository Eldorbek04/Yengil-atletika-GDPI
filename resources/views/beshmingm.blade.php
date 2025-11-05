@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        5000m
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
                5000m
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
                    @foreach ($beshmingm as $key => $beshmingms)
                        <tr>
                            <td data-label="#">{{ $beshmingm->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $beshmingms->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $beshmingms->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $beshmingms->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $beshmingms->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $beshmingms->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $beshmingms->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $beshmingm->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->