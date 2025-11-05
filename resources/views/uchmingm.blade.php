@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        3000m
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
                3000m
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
                    @foreach ($uchmingm as $key => $uchmingms)
                        <tr>
                            <td data-label="#">{{ $uchmingm->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $uchmingms->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $uchmingms->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $uchmingms->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $uchmingms->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $uchmingms->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $uchmingms->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $uchmingm->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->