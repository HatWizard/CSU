@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row"><p class="text-center"> <h1 class="display-3"> Подача документов  </h1></p></div>
    <div class="row">
        <div>
        <a href="{{route('request.create')}}" class="btn btn-primary">Создать запись</a>
        </div>
    </div>
    @if($errors->any())
        <br>
        @foreach ($errors->all() as $err)
        <div class="alert alert-danger" role="alert">
            <p>{{$err}}</p>
        </div>
        @endforeach    
    @endif
    <hr>
    <div class="card-deck">
        @if ($requests->count())
            @foreach ($requests as $req)
                <div class="card" style="max-width: 400px">
                    <div class="card-header">
                            <div class="row justify-content-between">
                                <h5>Анкета</h5>
                                <div class="float-left">
                                    @if ($req->record_state==1)
                                    <a href="{{route('request.delete', $req->id)}}" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">Статус: <p style="color: #0597aa">{{$req->getStateAttribute()}}</p></div>
                        <div class="card-text">Прогресс заполнения:</div>
                        <div class="progress">
                            <? $progress = $req->get_progress() ?>
                            <div class="progress-bar" 
                                 role="progressbar" 
                                 style="width: {{$progress*100}}%" 
                                 aria-valuenow="{{$progress*100}}" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                            </div>
                          </div>
                          <br>    

                        
                        <a href="{{route('request', $req->id)}}"
                           @if ($req->record_state!=1)
                               class="btn btn-primary disabled" aria-disabled=true
                           @else
                                class="btn btn-primary"
                           @endif>
                            Редактировать
                        </a>


                        <a href="{{route('request.store', $req->id)}}" 
                            @if ($req->is_completed() and $req->record_state==1)
                                class="btn btn-primary"   
                            @else
                                class="btn btn-primary disabled" aria-disabled=true
                            @endif>
                           Отправить
                        </a>
                        <div class="text-right"><p class="card-text"><small class="text-muted">Создано {{$req->created_at}}</small></p></div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">Кажется у вас нет активных анкет. Попробуйте создать новую!...</p>
        @endif


    </div>
</div>

@endsection
