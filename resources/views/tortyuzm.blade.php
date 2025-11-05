@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        400m
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
                400m
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
                    @foreach ($tortyuzm as $key => $tortyuzms)
                        <tr>
                            <td data-label="#">{{ $tortyuzm->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $tortyuzms->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $tortyuzms->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $tortyuzms->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $tortyuzms->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $tortyuzms->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $tortyuzms->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $tortyuzm->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->