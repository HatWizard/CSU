@extends('layouts.documentForm')
@section('requestPage')
<div class="container">
    <div class="card slide-in-right" id="page2">
        <div class="card-header">Этап 3</div>
        <div class="card-body">
            <br>
            <h5 class="card-title">Удостоверение личности</h5>  

            <div>
                <p class="card-text">Документ, удостоверяющий личность:</p>
                    <div>
                        <select class="browser-default custom-select selectionButton" id="validDoc">
                            <option disabled selected></option>
                            <option value="1">Временное удостоверение личности</option>
                            <option value="2">Загранпаспорт других стран</option>
                            <option value="3">Загранпаспорт РФ</option>
                            <option value="3">Паспорт инстранного гражданина</option>
                            <option value="3">Паспорт РФ</option>
                            <option value="3">Удостоверение личности другой страны</option>
                        </select>
                    </div>
            </div>

            <div class="form-group">
                <label for="validDoc_serialnumber">Серия</label>
                <input type="text" class="form-control" id="validDoc_serialnumber"  placeholder="Введите номер серии документа">
            </div>

            <div class="form-group">
                <label for="validDoc_number">Номер</label>
                <input type="text" class="form-control" id="validDoc_number"  placeholder="Введите номер документа">
            </div>

            <div class="form-group">
                <label for="validDoc_date">Дата выдачи</label>
                <input type="date" class="form-control" id="validDoc_date"  placeholder="Выберите дату выдачу документа">
            </div>

            <div>
                <label for="validDoc_photo">Фото<label>
                <input type="file" class="form-control" id="validDoc_date"  placeholder="Загрузите фото документа">
                <small class="form-text text-muted">Размер файла не может превывшать 500 кб. Чтобы загрузить несколько файлов, выделите их одновременно.</small>

            </div>


        </div>
    </div>
</div>
@endsection;

