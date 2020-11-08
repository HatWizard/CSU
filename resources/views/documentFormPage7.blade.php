@extends('layouts.documentForm')
@section('requestPage')
<div class="container">
    <div class="card hide" id="page2">
        <div class="card-header">Этап 2</div>
        <div class="card-body">
            <br>
            <h5 class="card-title">Паспортные данные</h5>  

            <div class="form-group">
                <label for="name_P2">Имя</label>
                <input type="text" class="form-control" id="num_P2"  placeholder="Введите ваше имя">
            </div>

            <div class="form-group">
                <label for="surname_P2">Фамилия</label>
                <input type="text" class="form-control" id="surname_P2"  placeholder="Введите вашу фамилию">
            </div>

            <div class="form-group">
                <label for="patronymic_P2">Отчество</label>
                <input type="text" class="form-control" id="patronymic_P2"  placeholder="Введите ваше отчество">
                <small id="emailHelp" class="form-text text-muted">При отсутствии отчества оставьте поле пустым</small>
            </div>

            <div class="form-group">
                <label for="birth_date_P2">Дата рождения</label>
                <input type="date" class="form-control" id="birth_date_P2"  placeholder="Введите ваше отчество">
            </div>
            <br>
            <h5 class="card-title">Данные связи</h5>  

            <div class="form-group">
                <label for="email_P2">Адресс эдектронной почты</label>
                <input type="email" class="form-control" id="email_P2" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">На этот адресс будет выслан ответ на ваше заявление</small>
            </div>

            <div class="form-group">
                <label for="number_P2">Мобильный телефон</label>
                <input type="tel" class="form-control" id="number_P2"  placeholder="Введите номер">
            </div>

        </div>
    </div>
</div>
@endsection;

