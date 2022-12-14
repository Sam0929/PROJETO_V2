@extends('layouts.main')

@section('title','Cadastro de novos alunos')

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
            @if (Auth::check() && Auth::user()->admin == 1)   
                <li class="nav-item"><a href="/alunos" class="nav-link active">Tabela de Alunos</a></li>
                <li class="nav-item"><a href="/professores" class="nav-link">Tabela de Professores</a></li>
            @endif
                <li class="nav-item"><a href="/cursos" class="nav-link">Cursos</a></li>
            </ul>
    
    </header>
</div>

<!--Conteúdo-->
<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>
                    <a class="btn btn-primary" href="{{url('alunos')}}" role="button">Voltar</a>  
                </div>
                    <div class='card-body'> 
                        @if( Request::is('*/edit'))
                        
                            <form action= "{{ url('alunos/update')}}/{{ $Aluno ->id }}" method="POST">
                        @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" name="name" class="form-control"  placeholder="Nome.." value ="{{ $Aluno-> Nome}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$User->email}}"> 
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Senha</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value ="{{$User->password}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">CPF</label>
                                    <input type="text" name="CPF" class="form-control"  placeholder="CPF.." value ="{{ $Aluno-> CPF}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                                    <input type="text" name="Endereço" class="form-control"  placeholder="Endereço.." value ="{{ $Aluno-> Endereço}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Filme</label>
                                    <select class="form-select" name="Filme" aria-label="Default select example" value = "{{ $Aluno-> Filme}}">
                                            
                                            <option selected>{{ $Aluno-> Filme}}</option>
					                        @foreach($movies as $movie)
					                        <option value="{{ $movie['nome'] }}">{{ $movie['nome'] }}</option>
					                        @endforeach
					                       
				                    </select>                    
                                </div>
                                
                                 <button type='submit' class='btn btn-primary'>Atualizar</button>
                            </form>
                        
        
                        @else
            <form action= "{{ url('alunos/add')}}" method="POST">
                        
                        @csrf
                <div class="row mb-0">
                        <div class="mb-3">   
                        <label for="name" class="form-label">{{ __('Nome') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome..">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
            
                    <div class="mb-3">
                            <label for="email" class="form-label">Endereço de email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email..">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                       

                        
                            

                    <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha..">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                            <div class="row mb-0">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">CPF</label>
                                    <input type="text" name="CPF" class="form-control"  placeholder="CPF..">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                                    <input type="text" name="Endereço" class="form-control"  placeholder="Endereço..">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Filme</label>
                                    <select class="form-select" name="Filme" aria-label="Default select example">
                                            
                                            @foreach($movies as $movie)
					                        <option value="{{ $movie['nome'] }}">{{ $movie['nome'] }}</option>
					                        @endforeach
					                        
				                    </select>                    
                                </div>
                            </div>
                                
                                    <button type='submit' class='btn btn-primary'>Salvar</button>
            </form>
                            @endif
                       
                    
                    </div>
            </div>
        </div>
    </div>
</div>

                
    

@endsection