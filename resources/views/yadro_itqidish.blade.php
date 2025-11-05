@extends('layouts.SiteFrond')
@section('content')
    @section('title')
        Yadro itqidish
    @endsection
    <section>
        <div class="container">
            <h1 class="container_h1">
            @lang('words.yadro-itqidish')
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
                    @foreach ($yadro as $key => $yadros)
                        <tr>
                            <td data-label="#">{{ $yadro->firstItem() + $key }}</td>

                            <td data-label="@lang('words.ism')">{{ $yadros->name }}</td>

                            <td data-label="@lang('words.familya')">{{ $yadros->family_name }}</td>

                            <td data-label="@lang('words.otasiniismi')">{{ $yadros->middle_name }}</td>

                            <td data-label="@lang('words.yonalishi')">{{ $yadros->orientation }}</td>

                            <td data-label="@lang('words.gurux')">{{ $yadros->group }}</td>

                            <td data-label="@lang('words.natija')">{{ $yadros->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer text-center" style="margin-top: 10px;">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item">
                            {{ $yadro->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
    </section>
@endsection
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->