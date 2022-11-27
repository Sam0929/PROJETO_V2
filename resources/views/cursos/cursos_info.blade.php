@extends('layouts.main')

@section('title','$Curso->Nome - Cursos')

@section('content')
<!--Cabeçalho-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Banco de Alunos</span>
      </a>

      <ul class="nav nav-pills">
             
             <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Dashboard</a></li>
         @if (Auth::check() && Auth::user()->admin == 1 or Auth::user()->profe == 1)   
             <li class="nav-item"><a href="alunos" class="nav-link">Tabela de Alunos</a></li>
             <li class="nav-item"><a href="/professores" class="nav-link">Tabela de Professores</a></li>
         @endif
             <li class="nav-item"><a href="/cursos" class="nav-link active">Cursos</a></li>
         </ul>
     
    </header>
</div>

<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-5">
        <img src="/img/imagemcursos.jpg" class="img-thumbnail" alt="{{ $Curso->Nome }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $Curso->Nome }}</h1>
        <p><ion-icon name="location-outline"></ion-icon> {{ $Curso->Tipo }}</p>
        <p><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/Y', strtotime($Curso->created_at)) }}</p>

        <p><ion-icon name="people-outline"></ion-icon> {{ count($Curso->Users) }} Alunos</p>
        <p class="card-alunos">
          @if (count($Curso->Users) == ($Curso->Max))
            <p class="text-break">Matrículas Encerradas</p>
          @else
          @if (count($Curso->Users) >= ($Curso->Min))
            <p class="text-break">Matrículas Abertas - Curso acontecerá!</p>
          @else
            <p class="text-break">Matrículas Abertas - Mínimo de alunos não atingido!</p>
          @endif
          @endif
         </p>
        @if ($Profe != null)
        <p><ion-icon name="star-outline"></ion-icon> {{ $Profe->Nome}}</p>
        @else
        <p ion-icon name="star-outline class=">Sem atribuição de professor até o momento!</p>
        @endif
        @if(!$hasUserJoined)
          <form action="/cursos/{{ $Curso->id }}/join" method="POST">
            @csrf
            <a class="btn btn-primary" href="cursos/{{$Curso->id}}/join"  id="event-submit"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Matricular
            </a>
          </form>
        @else
          <p class="already-joined-msg">Você já está matriculado neste Curso!</p>
        @endif
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o curso:</h3>
        <p class="event-description">{{ $Curso->Descrição}}</p>
      </div>
    </div>
  </div>

@endsection