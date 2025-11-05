@extends('layouts.admin')
@section('content')
    @include('admin.sitebar')
    @section('title')
        1500M Natijalar O'zgartirish
    @endsection
    <section class="add-result-section">
        <div class="show_res">
            <h2>Yangi Natija O'zgartirish (1500m)</h2>
            <a class="btn-add-new" href="{{ route('admin.birmingbeshyuzm.index') }}">Orqaga qaytish</a>
        </div>
        <form id="add-result-form" class="admin-form" action="{{ route('admin.birmingbeshyuzm.update', parameters: $birmingbeshyuzm->id) }}" method="POST"
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
                <input name="name" id="name" type="text" placeholder="Isim kiriting" required value="{{ $birmingbeshyuzm->name }}">
            </div>

            <div class="form-group">
                <label for="input-name">Familya:
                    @if ($errors->has('family_name'))
                            <span style="color: red;">
                              Familya kiriting
                            </span>
                        @endif
                </label>
                <input name="family_name" id="family_name" type="text" placeholder="Familya kiriting" required value="{{ $birmingbeshyuzm->family_name }}">
            </div>

            <div class="form-group">
                <label for="input-name">Otasining ismi:
                    @if ($errors->has('middle_name'))
                            <span style="color: red;">
                              Otasining ismini kiriting
                            </span>
                        @endif
                </label>
                <input name="middle_name" id="middle_name" type="text" placeholder="Otasining ismini kiriting" required value="{{ $birmingbeshyuzm->middle_name }}">
            </div>

            <div class="form-group">
                <label for="input-name">Yo'nalishi:
                    @if ($errors->has('orientation'))
                            <span style="color: red;">
                              Yo'nalishini kiriting
                            </span>
                        @endif
                </label>
                <input name="orientation" id="orientation" type="text" placeholder="Yo'nalishini kiriting" required value="{{ $birmingbeshyuzm->orientation }}">
            </div>

            <div class="form-group">
                <label for="input-name">Guruh:
                    @if ($errors->has('group'))
                            <span style="color: red;">
                              Guruhini kiriting
                            </span>
                        @endif
                </label>
                <input name="group" id="group" type="text" placeholder="Guruhini kiriting" required value="{{ $birmingbeshyuzm->group }}">
            </div>

            <div class="form-group">
                <label for="input-name">Natija:
                    @if ($errors->has('result'))
                            <span style="color: red;">
                              Natijani kiriting
                            </span>
                        @endif
                </label>
                <input name="result" id="result" type="text" placeholder="Natijani kiriting" required value="{{ $birmingbeshyuzm->result }}">
            </div>

            <button type="submit" class="btn-submit">Natijani Qo'shish</button>
        </form>
    </section>
@endsection