@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        Balandlikka sakrash
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
            @lang('words.balandlikka_sakrash')
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
                    @foreach ($balandlikkasakrash as $key => $balandlikkasakrashs)
                        <tr>
                            <td data-label="#">{{ $balandlikkasakrash->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $balandlikkasakrashs->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $balandlikkasakrashs->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $balandlikkasakrashs->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $balandlikkasakrashs->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $balandlikkasakrashs->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $balandlikkasakrashs->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $balandlikkasakrash->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->