@extends('layouts.documentForm')
@section('requestPage')
<div class="container">

    <div class="card slide-in-right" id="page2">
        <div class="card-header">Этап 2</div>
        <div class="card-body">
            <form method="POST" action="{{route('request', $request_id)}}/residence_info" enctype="multipart/form-data" id="r_info">
                @csrf
                <br>
                <h5 class="card-title">Место регистрации</h5>  


                <div class="form-group row">
                    <label for="residence_index" class="col-md-4 col-form-label text-md-right">Индекс</label>
                    <div class="col-md-6">
                        <input id="residence_index" 
                               type="text" 
                               class="form-control @error('residence_index') is-invalid @enderror" 
                               name="residence_index" value="{{ old('residence_index') }}" 
                               autocomplete="residence_index" 
                               autofocus>
                        @error('residence_index')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="residence_region" class="col-md-4 col-form-label text-md-right">Регион</label>
                    <div class="col-md-6">
                        <input id="residence_region" 
                               type="text" 
                               class="form-control @error('residence_region') is-invalid @enderror" 
                               name="residence_region" value="{{ old('residence_region') }}" 
                               autocomplete="residence_region" 
                               autofocus>
                        @error('residence_region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="residence_district" class="col-md-4 col-form-label text-md-right">Район</label>
                    <div class="col-md-6">
                        <input id="residence_district" 
                               type="text" 
                               class="form-control @error('residence_district') is-invalid @enderror" 
                               name="residence_district" value="{{ old('residence_district') }}" 
                               autocomplete="residence_district" 
                               autofocus>
                        @error('residence_district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="residence_city" class="col-md-4 col-form-label text-md-right">Город</label>
                    <div class="col-md-6">
                        <input id="residence_city" 
                               type="text" 
                               class="form-control @error('residence_city') is-invalid @enderror" 
                               name="residence_city" value="{{ old('residence_district') }}" 
                               autocomplete="residence_city" 
                               autofocus>
                        @error('residence_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="residence_street" class="col-md-4 col-form-label text-md-right">Улица</label>
                    <div class="col-md-6">
                        <input id="residence_street" 
                               type="text" 
                               class="form-control @error('residence_street') is-invalid @enderror" 
                               name="residence_street" value="{{ old('residence_district') }}" 
                               autocomplete="residence_street" 
                               autofocus>
                        @error('residence_street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="residence_homeNumber" class="col-md-4 col-form-label text-md-right">Номер дома</label>
                    <div class="col-md-6">
                        <input id="residence_homeNumber" 
                               type="text" 
                               class="form-control @error('residence_homeNumber') is-invalid @enderror" 
                               name="residence_homeNumber" value="{{ old('residence_district') }}" 
                               autocomplete="residence_homeNumber" 
                               autofocus>
                        @error('residence_homeNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                        
                <div class="form-group row">
                    <label for="residence_apartmentNumber" class="col-md-4 col-form-label text-md-right">Номер квартиры</label>
                    <div class="col-md-6">
                        <input id="residence_apartmentNumber" 
                               type="text" 
                               class="form-control @error('residence_apartmentNumber') is-invalid @enderror" 
                               name="residence_apartmentNumber" value="{{ old('residence_district') }}" 
                               autocomplete="residence_apartmentNumber" 
                               autofocus>
                        @error('residence_apartmentNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                        
                <div class="form-group row">
                    <label for="citizenship" class="col-md-4 col-form-label text-md-right">Гражданство</label>
                    <div class="col-md-6">
                        <input id="citizenship" 
                               type="text" 
                               class="form-control @error('citizenship') is-invalid @enderror" 
                               name="citizenship" value="{{ old('residence_district') }}" 
                               autocomplete="citizenship" 
                               autofocus>
                        @error('citizenship')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-primary">Далее</button>
            </form>
        </div>
    </div>
</div>
@endsection;

