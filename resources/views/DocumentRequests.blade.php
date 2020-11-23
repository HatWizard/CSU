@extends('layouts.documentForm')
@section('requestPage')

<div class="container">
    <table style="width:100%">
        <tr>

         <th>Запрос</th>
         <th>Дата создания</th>
         <th>Статус</th>
        </tr>
            <?
            $requests = App\Models\DocumentRequest::where('user_id', '=', auth()->user()->id)->get()
            ?>
        @foreach ($requests as $item)
            <?
            echo "<td><a href=".url()->current()."/".$item->id.">Редактировать запрос</a></td>";
            echo "<td>".$item->created_at->format('Y-m-d')."</td>";          
            ?>
        @endforeach
      </table>
</div>

@endsection