@extends('layouts.documentForm')
@section('requestPage')
<div class="container">
    <div class="card slide-in-right" id="page2">
        <div class="card-header">Этап 2</div>
        <div class="card-body">
            <form method="POST" action="/home/request/create/education_info" enctype="multipart/form-data" id="p_info">
                @csrf
                <div class="form-group row">
                    <label for="education_level" class="col-md-4 col-form-label text-md-right">Уровень образования</label>
                    <div class="col-md-6">
                        <select class="browser-default custom-select selectionButton" id="education_level" name= "education_level" required>
                            <option disabled selected><p class="white-text"></p></option>
                            <option value="1">Высшее</option>
                            <option value="2">Основное</option>
                            <option value="3">Среднее общее</option>
                            <option value="4">Среднее специальное</option>
                        </select>
                        @error('education_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="education_document_type" class="col-md-4 col-form-label text-md-right">Тип документа об образовании</label>
                    <div class="col-md-6">
                        <select class="browser-default custom-select selectionButton" id="education_document_type" name= "education_document_type" required>
                            <option disabled selected><p class="white-text"></p></option>
                            <option value="1">Аттестат</option>
                            <option value="2">Диплом Бакалавра</option>
                            <option value="3">Диплом дипломированного специалиста</option>
                            <option value="4">Диплом магистра</option>
                            <option value="5">Диплом о начальном профессиональном образовании</option>
                            <option value="6">Диплом о среднем профессиональном образовании</option>
                            <option value="7">Диплом специалиста</option>
                        </select>
                        @error('education_document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="education_document_serial" class="col-md-4 col-form-label text-md-right">Серия документа об образовании</label>
                    <div class="col-md-6">
                        <input id="education_document_serial" 
                            type="text" 
                            class="form-control @error('education_document_serial') is-invalid @enderror" 
                            name="education_document_serial" value="{{ old('residence_district') }}" 
                            autocomplete="education_document_serial" 
                            autofocus>
                        @error('education_document_serial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="education_document_number" class="col-md-4 col-form-label text-md-right">Номер документа об образовании</label>
                    <div class="col-md-6">
                        <input id="education_document_number" 
                            type="text" 
                            class="form-control @error('education_document_number') is-invalid @enderror" 
                            name="education_document_number" value="{{ old('residence_district') }}" 
                            autocomplete="education_document_number" 
                            autofocus>
                        @error('education_document_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="education_date" class="col-md-4 col-form-label text-md-right">Дата выдачи</label>
                    <div class="col-md-6">
                        <input id="education_date" 
                            type="date" 
                            class="form-control @error('education_date') is-invalid @enderror" 
                            name="education_date" value="{{ old('residence_district') }}" 
                            autocomplete="education_date" 
                            autofocus>
                        @error('education_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="education_region" class="col-md-4 col-form-label text-md-right">Регион учебного заведения</label>
                    <div class="col-md-6">
                        <input id="education_region" 
                            type="text" 
                            class="form-control @error('education_region') is-invalid @enderror" 
                            name="education_region" value="{{ old('residence_district') }}" 
                            autocomplete="education_region" 
                            autofocus>
                        @error('education_region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="education_institution_name" class="col-md-4 col-form-label text-md-right">Наименование учебного заведения</label>
                    <div class="col-md-6">
                        <input id="education_institution_name" 
                            type="text" 
                            class="form-control @error('education_institution_name') is-invalid @enderror" 
                            name="education_institution_name" value="{{ old('residence_district') }}" 
                            autocomplete="education_institution_name" 
                            autofocus>
                        @error('education_institution_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>





                <div class="form-group row">
                    <label for="education_language" class="col-md-4 col-form-label text-md-right">Укажите язык, который вы изучали</label>
                    <div class="col-md-6">
                        <select class="browser-default custom-select selectionButton" id="education_language" name= "education_language" required>
                            <option disabled selected><p class="white-text"></p></option>
                            <option value="1">Английский</option>
                            <option value="2">Итальянский</option>
                            <option value="3">Немецкий</option>
                            <option value="4">Русский</option>
                            <option value="5">Французкий</option>
                        </select>
                        @error('education_language')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="educationDoc_photo" class="col-md-4 col-form-label text-md-right">Фото документа</label>
                    <div class="col-md-6">
                        <input id="educationDoc_photos[]" 
                            type="file" 
                            class="form-control"
                            name="educationDoc_photo[]" 
                            autocomplete="educationDoc_photo[]"
                            autofocus
                            required
                            multiple
                            >
                    </div>
                </div>
                <br>
                <button type="submit">Далее</button>
            </form>
        </div>
    </div>
</div>
@endsection;

