@extends('layouts.SiteFrond')

@section('title')
    100m Natijalari
@endsection

@section('content')
<section>
    <div class="container">
        <h1 class="container_h1">100m Natijalari</h1>

        <div class="filter-buttons" style="margin-bottom: 25px; display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            {{-- Hammasi --}}
            <a href="{{ request()->url() }}" 
               class="btn-action {{ !request('gender') ? 'active-filter' : '' }}" 
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
                    @forelse ($yuzm as $key => $yuzms)
                        <tr>
                            <td data-label="#">{{ $yuzm->firstItem() + $key }}</td>
                            <td data-label="@lang('words.ism')">{{ $yuzms->name }}</td>
                            <td data-label="@lang('words.familya')">{{ $yuzms->family_name }}</td>
                            <td data-label="@lang('words.otasiniismi')">{{ $yuzms->middle_name }}</td>
                            <td data-label="@lang('words.yonalishi')">{{ $yuzms->orientation }}</td>
                            <td data-label="@lang('words.gurux')">{{ $yuzms->group }}</td>
                            <td data-label="@lang('words.natija')" style="color: #dc2626; font-weight: bold;">
                                {{ $yuzms->result }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 20px;">Ma'lumot topilmadi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrapper" style="margin-top: 20px; display: flex; justify-content: center;">
            {{ $yuzm->appends(request()->query())->links() }}
        </div>
    </div>
</section>

<style>
    .active-filter {
        box-shadow: 0 0 0 3px rgba(0,0,0,0.2), inset 0 2px 4px rgba(0,0,0,0.1);
        transform: translateY(2px);
        opacity: 0.9;
    }
    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
</style>
@endsection