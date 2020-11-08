@extends('layouts.documentForm')
@section('requestPage')
<div class="container">
    <div class="card slide-in-right" id="page2">
        <div class="card-header">Этап 3</div>
        <div class="card-body">
            <br>
            <h5 class="card-title">Место регистрации</h5>  

            <div class="form-group">
                <label for="index">Индекс</label>
                <input type="text" class="form-control" id="index"  placeholder="Введите ваш индекс">
            </div>

            <div class="form-group">
                <label for="region">Регион</label>
                <input type="text" class="form-control" id="region"  placeholder="Введите ваш регион">
            </div>

            
            <div class="form-group">
                <label for="subregion">Район</label>
                <input type="text" class="form-control" id="subregion"  placeholder="Введите название вашего района">
            </div>

            <div class="form-group">
                <label for="city">Город</label>
                <input type="text" class="form-control" id="city"  placeholder="Введите название вашего города">
            </div>

            
            <div class="form-group">
                <label for="homeAddres">Дом</label>
                <input type="text" class="form-control" id="homeAddres"  placeholder="Введите номер вашего дома">
            </div>

                        
            <div class="form-group">
                <label for="apartment"></label>
                <input type="text" class="form-control" id="apartment"  placeholder="Введите номер вашей квартиры">
            </div>

            <div class="form-group">
                <label for="citizen"></label>
                <input type="text" class="form-control" id="citizen"  placeholder="Введите страну вашего гражданства">
            </div>

        </div>
    </div>
</div>
@endsection;

