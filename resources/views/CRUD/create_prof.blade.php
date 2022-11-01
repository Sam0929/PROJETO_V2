@extends('layouts.main')

@section('title','Cadastro de novos professores')

@section('content')

<!--Cabeçalho-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Banco de Alunos</span>
      </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link" >Home</a></li>
                <li class="nav-item"><a href="/alunos" class="nav-link">Tabela de Alunos</a></li>
                <li class="nav-item"><a href="/professores" class="nav-link">Tabela de Professores</a></li>
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
                    
                                            @if (Request::is('*/edit'))
                                            <form action= "{{ url('/professores/update')}}/{{ $Professor->id }}" method="POST">
                        @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" name="Nome" class="form-control"  placeholder="Nome.." value ="{{ $Professor-> Nome}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">CPF</label>
                                    <input type="text" name="CPF" class="form-control"  placeholder="CPF.." value ="{{ $Professor-> CPF}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                                    <input type="text" name="Endereço" class="form-control"  placeholder="Endereço.." value ="{{ $Professor-> Endereço}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Usuário</label>
                                    <input type="text" name="Usuário" class="form-control"  placeholder="Usuário.." value = "{{ $Professor-> Usuário}}">                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Senha</label>
                                    <input type="text" name="Senha" class="form-control"  placeholder="Senha.." value = "{{ $Professor-> Senha}}">                    
                                </div>
                                
                                 <button type='submit' class='btn btn-primary'>Atualizar</button>
                            </form>
                        @else
                                                <form action= "{{ url('professores/add')}}" method="POST">
                                            @csrf
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                                    <input type="text" name="Nome" class="form-control"  placeholder="Nome..">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">CPF</label>
                                                    <input type="text" name="CPF" class="form-control"  placeholder="CPF..">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                                                    <input type="text" name="Endereço" class="form-control"  placeholder="Endereço..">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Usuário</label>
                                                    <input type="text" name="Usuário" class="form-control"  placeholder="Usuário..">               
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Senha</label>
                                                    <input type="text" name="Senha" class="form-control"  placeholder="Senha..">               
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