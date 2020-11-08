@extends('layouts.documentForm')
@section('requestPage')
<div class="container">
    <div class="card slide-in-right" id="page1">
        <div class="card-header">Этап 1</div>
        <div class="card-body">
            <h5 class="card-title">Информация о поступлении</h5>     
            <div>
                <p class="card-text">Выберите подразделение:</p>
                    <div>
                        <select class="browser-default custom-select selectionButton" id="subunit_P1">
                            <option disabled selected></option>
                            <option value="1">ЧелГУ</option>
                            <option value="2">Миас</option>
                            <option value="3">Троицк</option>
                        </select>
                    </div>
            </div>
            <div>
                <p class="card-text">Выберите уровень образования, на который хотите поступать:</p>
                <select class="browser-default custom-select selectionButton" id="education_level_P1">
                    <option disabled selected><p class="white-text"></p></option>
                    <option value="1">Колледж</option>
                    <option value="2">Бакалавриат/Специалитет</option>
                    <option value="3">Магистратура</option>
                    <option value="4">Аспирантура</option>
                </select>
            </div>

            <button>Далее</button>
        </div>
    </div>
</div>
@endsection
