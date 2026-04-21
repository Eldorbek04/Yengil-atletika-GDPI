@extends('layouts.admin')

@section('title')
    100M Natijani Tahrirlash
@endsection

@section('content')
    @include('admin.sitebar')

    <section class="add-result-section">
        <div class="show_res">
            <h2>Natijani O'zgartirish (100m)</h2>
            <a class="btn-add-new" href="{{ route('admin.yuzm.index') }}">Orqaga qaytish</a>
        </div>

        <form id="add-result-form" class="admin-form" action="{{ route('admin.yuzm.update', $yuzm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Ism --}}
            <div class="form-group">
                <label for="name">Ism:
                    @error('name') <span style="color: red;">Ism kiriting</span> @enderror
                </label>
                <input name="name" id="name" type="text" placeholder="Ism kiriting" required value="{{ old('name', $yuzm->name) }}">
            </div>

            {{-- Familya --}}
            <div class="form-group">
                <label for="family_name">Familya:
                    @error('family_name') <span style="color: red;">Familya kiriting</span> @enderror
                </label>
                <input name="family_name" id="family_name" type="text" placeholder="Familya kiriting" required value="{{ old('family_name', $yuzm->family_name) }}">
            </div>

            {{-- Otasining ismi --}}
            <div class="form-group">
                <label for="middle_name">Otasining ismi:
                    @error('middle_name') <span style="color: red;">Otasining ismini kiriting</span> @enderror
                </label>
                <input name="middle_name" id="middle_name" type="text" placeholder="Otasining ismini kiriting" required value="{{ old('middle_name', $yuzm->middle_name) }}">
            </div>

            {{-- Yo'nalishi --}}
            <div class="form-group">
                <label for="orientation">Yo'nalishi:
                    @error('orientation') <span style="color: red;">Yo'nalishini kiriting</span> @enderror
                </label>
                <input name="orientation" id="orientation" type="text" placeholder="Yo'nalishini kiriting" required value="{{ old('orientation', $yuzm->orientation) }}">
            </div>

            {{-- Guruh --}}
            <div class="form-group">
                <label for="group">Guruh:
                    @error('group') <span style="color: red;">Guruhini kiriting</span> @enderror
                </label>
                <input name="group" id="group" type="text" placeholder="Guruhini kiriting" required value="{{ old('group', $yuzm->group) }}">
            </div>

            {{-- Natija --}}
            <div class="form-group">
                <label for="result">Natija (soniya):
                    @error('result') <span style="color: red;">Natijani kiriting</span> @enderror
                </label>
                <input name="result" id="result" type="text" placeholder="Masalan: 12.45" required value="{{ old('result', $yuzm->result) }}">
            </div>

            {{-- Jinsi --}}
            <div class="form-group">
                <label for="gender">Jinsi:
                    @error('gender') <span style="color: red;">Jinsini tanlang</span> @enderror
                </label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="male" {{ old('gender', $yuzm->gender) == 'male' ? 'selected' : '' }}>O'g'il bola</option>
                    <option value="female" {{ old('gender', $yuzm->gender) == 'female' ? 'selected' : '' }}>Qiz bola</option>
                </select>
            </div>
            
            <button type="submit" class="btn-submit">O'zgarishlarni saqlash</button>
        </form>
    </section>
@endsection