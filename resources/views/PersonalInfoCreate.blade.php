@extends('layouts.documentForm')
@section('requestPage')

<div class="container">
    <div class="card slide-in-right" id="page1">
        <div class="card-body">
            <form method="POST" action="/home/request/personal_info" enctype="multipart/form-data">
            @csrf
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

            <br>
            <h5 class="card-title">Паспортные данные</h5>  


            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
                <div class="col-md-6">
                    <input id="name" 
                           type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" 
                           autocomplete="name" 
                           autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            
            <div class="form-group row">
                <label for="surname" class="col-md-4 col-form-label text-md-right">Фамилия</label>
                <div class="col-md-6">
                    <input id="surname" 
                           type="text" 
                           class="form-control @error('surname') is-invalid @enderror" 
                           name="surname" value="{{ old('surname') }}" 
                           autocomplete="surname" 
                           autofocus>
                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="patronymic" class="col-md-4 col-form-label text-md-right">Отчество</label>
                <div class="col-md-6">
                    <input id="patronymic" 
                           type="text" 
                           class="form-control @error('patronymic') is-invalid @enderror" 
                           name="patronymic" value="{{ old('patronymic') }}" 
                           autocomplete="patronymic" 
                           autofocus>
                    @error('patronymic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="birthdate" class="col-md-4 col-form-label text-md-right">Дата рождения</label>
                <div class="col-md-6">
                    <input id="birthdate" 
                           type="date" 
                           class="form-control @error('birthdate') is-invalid @enderror" 
                           name="birthdate" value="{{ old('birthdate') }}" 
                           autocomplete="birthdate" 
                           autofocus>
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <h5 class="card-title">Данные связи</h5>  

            
            <div class="form-group row">
                <label for="response_email" class="col-md-4 col-form-label text-md-right">Почта</label>
                <div class="col-md-6">
                    <input id="response_email" 
                           type="email"
                           class="form-control @error('response_email') is-invalid @enderror" 
                           name="response_email" value="{{ old('response_email') }}" 
                           autocomplete="response_email" 
                           autofocus>
                    @error('response_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for='phone_number' class="col-md-4 col-form-label text-md-right">Номер телефона</label>
                <div class="col-md-6">
                    <input id="phone_number" 
                           type="tel"
                           class="form-control @error('phone_number') is-invalid @enderror" 
                           name="phone_number" value="{{ old('phone_number') }}" 
                           autocomplete="phone_number" 
                           autofocus>
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <button>Далее</button>
        </div>
    </div>
    </form>
</div>
@endsection
