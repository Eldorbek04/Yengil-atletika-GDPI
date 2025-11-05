@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        Uzunlikka sakrash
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
            @lang('words.uzunlikka_sakrash')
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
                    @foreach ($uzunlikkasakrash as $key => $uzunlikkasakrashs)
                        <tr>
                            <td data-label="#">{{ $uzunlikkasakrash->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $uzunlikkasakrashs->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $uzunlikkasakrashs->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $uzunlikkasakrashs->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $uzunlikkasakrashs->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $uzunlikkasakrashs->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $uzunlikkasakrashs->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $uzunlikkasakrash->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->