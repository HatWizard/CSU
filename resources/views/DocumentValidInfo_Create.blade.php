@extends('layouts.documentForm')
@section('requestPage')
<div class="container">
    <div class="card slide-in-right" id="page2">
        <div class="card-header">Этап 3</div>
        <div class="card-body">
            <br>
        <form method="POST" action="{{route('request', $request_id)}}/documentValid_info" enctype="multipart/form-data" id="p_info">
                @csrf
                <h5 class="card-title">Удостоверение личности</h5>            
                <div class="form-group row">
                    <label for="validDoc_document_type" class="col-md-4 col-form-label text-md-right">Тип документа</label>
                    <div class="col-md-6">
                        <select class="browser-default custom-select selectionButton" id="validDoc_document_type" name= "validDoc_document_type" required>
                            <option disabled selected><p class="white-text"></p></option>
                            <option value="1">Временное удостоверение личности</option>
                            <option value="2">Загранпаспорт других стран</option>
                            <option value="3">Загранпаспорт РФ</option>
                            <option value="4">Паспорт инстранного гражданина</option>
                            <option value="5">Паспорт РФ</option>
                            <option value="6">Удостоверение личности другой страны</option>
                        </select>
                        @error('validDoc_document_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="validDoc_serial" class="col-md-4 col-form-label text-md-right">Серия</label>
                    <div class="col-md-6">
                        <input id="validDoc_serial" 
                               type="text" 
                               class="form-control @error('validDoc_serial') is-invalid @enderror" 
                               name="validDoc_serial" value="{{ old('validDoc_serial') }}" 
                               autocomplete="validDoc_serial" 
                               autofocus>
                        @error('validDoc_serial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="validDoc_number" class="col-md-4 col-form-label text-md-right">Номер</label>
                    <div class="col-md-6">
                        <input id="validDoc_number" 
                               type="text" 
                               class="form-control @error('validDoc_number') is-invalid @enderror" 
                               name="validDoc_number" value="{{ old('validDoc_number') }}" 
                               autocomplete="validDoc_number" 
                               autofocus>
                        @error('validDoc_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="validDoc_date" class="col-md-4 col-form-label text-md-right">Дата выдачи</label>
                    <div class="col-md-6">
                        <input id="validDoc_date" 
                               type="date" 
                               class="form-control @error('validDoc_date') is-invalid @enderror" 
                               name="validDoc_date" value="{{ old('validDoc_date') }}" 
                               autocomplete="validDoc_date" 
                               autofocus>
                        @error('validDoc_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="validDoc_subdivision_code" class="col-md-4 col-form-label text-md-right">Код подразделения выдачи</label>
                    <div class="col-md-6">
                        <input id="validDoc_subdivision_code" 
                               type="text" 
                               class="form-control @error('validDoc_subdivision_code') is-invalid @enderror" 
                               name="validDoc_subdivision_code" value="{{ old('validDoc_subdivision_code') }}" 
                               autocomplete="validDoc_subdivision_code" validDoc_subdivision_code
                               autofocus>
                        @error('validDoc_subdivision_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="validDoc_photos" class="col-md-4 col-form-label text-md-right">Фото документа</label>
                    <div class="col-md-6">
                        <input id="validDoc_photos[]" 
                               type="file" 
                               class="form-control"
                               name="validDoc_photos[]" 
                               autocomplete="validDoc_photos[]"
                               autofocus
                               required
                               multiple
                               >
                    </div>
                </div>
                <button class="btn btn-primary">Далее</button>

            </form>

        </div>
    </div>
</div>
@endsection;

