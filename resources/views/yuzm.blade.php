@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        100m
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
                100m
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
                    @foreach ($yuzm as $key => $yuzms)
                        <tr>
                            <td data-label="#">{{ $yuzm->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $yuzms->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $yuzms->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $yuzms->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $yuzms->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $yuzms->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $yuzms->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $yuzm->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->