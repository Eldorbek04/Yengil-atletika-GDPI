@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        200m
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
                200
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
                    @foreach ($ikkiyuzm as $key => $ikkiyuzms)
                        <tr>
                            <td data-label="#">{{ $ikkiyuzm->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $ikkiyuzms->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $ikkiyuzms->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $ikkiyuzms->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $ikkiyuzms->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $ikkiyuzms->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $ikkiyuzms->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $ikkiyuzm->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->