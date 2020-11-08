@extends('layouts.app')
@section('content')
@yield('requestPage')


<nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href=<?php echo "/request/".($_SESSION['docreq_stage']-1) ?>>Previous</a></li>
      <li class="page-item"><a class="page-link" href=<?php echo "/request/".($_SESSION['docreq_stage']+1) ?>>Nex</a></li>
    </ul>
</nav>
@endsection