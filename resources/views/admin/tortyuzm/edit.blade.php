@extends('layouts.admin')
@section('content')
    @include('admin.sitebar')
    @section('title')
        400M Natijalar O'zgartirish
    @endsection
    <section class="add-result-section">
        <div class="show_res">
            <h2>Yangi Natija O'zgartirish (400m)</h2>
            <a class="btn-add-new" href="{{ route('admin.tortyuzm.index') }}">Orqaga qaytish</a>
        </div>
        <form id="add-result-form" class="admin-form" action="{{ route('admin.tortyuzm.update', parameters: $tortyuzm->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="input-name">Ism:
                    @if ($errors->has('name'))
                        <span style="color: red;">
                            Isim kiriting
                        </span>
                    @endif
                </label>
                <input name="name" id="name" type="text" placeholder="Isim kiriting" required value="{{ $tortyuzm->name }}">
            </div>

            <div class="form-group">
                <label for="input-name">Familya:
                    @if ($errors->has('family_name'))
                        <span style="color: red;">
                            Familya kiriting
                        </span>
                    @endif
                </label>
                <input name="family_name" id="family_name" type="text" placeholder="Familya kiriting" required
                    value="{{ $tortyuzm->family_name }}">
            </div>

            <div class="form-group">
                <label for="input-name">Otasining ismi:
                    @if ($errors->has('middle_name'))
                        <span style="color: red;">
                            Otasining ismini kiriting
                        </span>
                    @endif
                </label>
                <input name="middle_name" id="middle_name" type="text" placeholder="Otasining ismini kiriting" required
                    value="{{ $tortyuzm->middle_name }}">
            </div>

            <div class="form-group">
                <label for="input-name">Yo'nalishi:
                    @if ($errors->has('orientation'))
                        <span style="color: red;">
                            Yo'nalishini kiriting
                        </span>
                    @endif
                </label>
                <input name="orientation" id="orientation" type="text" placeholder="Yo'nalishini kiriting" required
                    value="{{ $tortyuzm->orientation }}">
            </div>

            <div class="form-group">
                <label for="input-name">Guruh:
                    @if ($errors->has('group'))
                        <span style="color: red;">
                            Guruhini kiriting
                        </span>
                    @endif
                </label>
                <input name="group" id="group" type="text" placeholder="Guruhini kiriting" required
                    value="{{ $tortyuzm->group }}">
            </div>

            <div class="form-group">
                <label for="input-name">Natija:
                    @if ($errors->has('result'))
                        <span style="color: red;">
                            Natijani kiriting
                        </span>
                    @endif
                </label>
                <input name="result" id="result" type="text" placeholder="Natijani kiriting" required
                    value="{{ $tortyuzm->result }}">
            </div>

            <button type="submit" class="btn-submit">Natijani Qo'shish</button>
        </form>
    </section>
@endsection