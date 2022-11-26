@extends('layouts.main')

@section('title','Dashboard')

@section('content')

<!--Cabeçalho-->


<!--Conteúdo-->
<div class='container text-center'>
    <div class='row justify-content-center'>
        <div class='col-md-12'>
            <div class='card'>
                <div class='card-body'>
                    
                    <h1>Seja Bem-Vindo!</h1>
                              
                </div>
                    
            </div>
        </div>
    </div>
</div>
@auth    
<div class='container'>
    <div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
                
            <ul class="nav nav-pills">
             
                <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Dashboard</a></li>
            @if (Auth::check() && Auth::user()->admin == 1 or Auth::user()->profe == 1)   
                <li class="nav-item"><a href="alunos" class="nav-link">Tabela de Alunos</a></li>
                <li class="nav-item"><a href="/professores" class="nav-link">Tabela de Professores</a></li>
            @endif
                <li class="nav-item"><a href="/cursos" class="nav-link">Cursos</a></li>
            </ul>
            
            </div>
        </div>
    </div>
</div>
@endauth
<div class='container'>
    <div class='col-md-12'>
        <div class='card'>
            <div class='card-body'>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        
                    </div>
                <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/img/laravel01.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Feito com Laravel</h5>
                            <p>Em sua versão mais recente 9.x</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="/img/database0.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bando de dados de alunos</h5>
                            <p>Com interface Web!</p>
                        </div>
                        </div>
                </div>
            </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>               
            </div>
        </div>
    </div>
</div>










@endsection