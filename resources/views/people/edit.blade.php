﻿@extends('adminlte::page')

@section('title', 'Editar Pessoas')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
       <h3 class="box-title">Editar pessoas</h3>
    </div>
    <div role="form">
    <div class="box-body">
        @include('sweet::alert')
                    <form action="{{ route('people.update', $people->id) }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="put">

                    <div class="form-group col-md-2">
                        <label for="profile" >Perfil</label>
                        <div required name="profile" class="auto-control" required autofocus>
                        <select class="form-control"  id = "profile" name="profile" onchange="habilitaBtn()">
                            @if($people->profile == '1')
                                <option value= "{{ $people->profile }}" >Administrador</option>
                                <option value="1">Administrador</option>
                            @endif
                            @if($people->profile == '3')
                                <option value= "{{ $people->profile }}" >Cliente</option>
                                <option value="3">Cliente</option>
                            @endif
                            @if($people->profile == '2')
                                <option value= "{{ $people->profile }}" >Funcionário</option>
                                <option value="2">Funcionário</option>
                            @endif
                        </select>

                        @if($errors->has('profile'))
                        <span class="help-block">
                            <strong>{{$errors->first('profile')}}</strong>
                        </span>
                        @endif
                        </div>
                    </div>

					<!-- se clicar em Funcionario -->
                    <div style="display:none" id='funcionario'class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="office">Cargo</label>
                            <input id = "cargo" type="text" name="office"  value="{{$people->office}}" class="form-control" placeholder="Descreva o Cargo do Funcionário">
                            <label for="sector">Setor</label>
                            <input type="text" name="sector" value="{{$people->sector}}" class="form-control" placeholder="Descreva o setor que trabalha">
                    </div>
                    <div class="form-group col-md-6 {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$people->name}}" name="name" class="form-control" placeholder="Nome do cliente">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class=" form-group col-md-2" value="{{ old('birthdate') }}">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="date" name="birthdate" value="{{$people->birthdate}}" class="form-control" placeholder="Data de nascimento">
                        </div>


                        <div class=" form-group col-md-2" >
                            <label for="genre">Genero</label>
                            <select class="form-control" value="{{$people->genre}}" name = "genre">
                                @if($people->genre == 'M')
                                <option value= "{{ $people->genre }}" >Masculino</option>
                                <option value="F">Femenino</option>
                                @endif
                                @if($people->genre == 'F')
                                <option value= "{{ $people->genre }}" >Feminino</option>
                                <option value="M">Masculino</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-2 {{$errors->has('cpf') ? 'has-error' : '' }}" value="{{ old('cpf') }}">
                            <label for="cpf">CPF</label>
                            <input disabled=true  type="text" name="cpf" value="{{$people->cpf}}" id= "cpf"  class="form-control" placeholder="999.999.999-99" >
                        @if($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{$errors->first('cpf')}}</strong>
                        </span>
                        @endif
                       </div>

                        <div class="form-group col-md-2">
                            <label for="rg">RG</label>
                            <input type="text" value="{{$people->rg}}" name="rg" id ="rg" class="form-control" placeholder="9999.999.99-9">
                        </div>

                        <div  class="form-group col-md-2">
                            <label for="state">Estado</label>
                            <select  name ='state' value="{{$people->state}}" class="form-control" value='' id="state" ></select>
                            <small class="text-danger"></small>
                        </div>

                        <div  class="form-group col-md-4">
                            <label for="city">Cidade</label>
                            <select  name ='city' class="form-control" value="{{$people->city}}" id="city"></select>
                            <small class="text-danger"></small>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="cep">CEP</label>
                            <input class="form-control" name="cep" value="{{$people->cep}}" type="text" id="cep"  placeholder="99.999-999">
                            <small class="text-danger"></small>
                        </div>

                        <div class="form-group col-md-12 {{$errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" value="{{$people->address}}" class="form-control" placeholder="Endereço do cliente">
                            @if($errors->has('address'))
                        <span class="help-block">
                            <strong>{{$errors->first('address')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-1">
                            <label for="number">Número</label>
                            <input type="text" name="number" value="{{$people->number}}" class="form-control" placeholder="Número residência">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="district">Bairro</label>
                            <input type="text" name="district" value="{{$people->disctict}}" class="form-control" placeholder="Bairro">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="complement">Complemento</label>
                            <input type="text" name="complement" value="{{$people->complement}}" class="form-control" placeholder="Complemento">
                        </div>

                        <div class="form-group col-md-4 {{$errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">Telefone</label>
                            <input type="text" name="telephone" value="{{$people->telephone}}" id = "telephone" class="form-control" placeholder="Telefone do cliente">
                        @if($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{$errors->first('telephone')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-8 {{$errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" value="{{$people->email}}" class="form-control" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-12{{$errors->has('obs') ? 'has-error' : '' }}">
                            <label for="obs">Observação</label>
                            <input type="textarea" name="obs" value="{{$people->obs}}" class="form-control" placeholder="Observação">
                            @if($errors->has('obs'))
                        <span class="help-block">
                            <strong>{{$errors->first('obs')}}</strong>
                        </span>
                        @endif
                        </div>
                        
                        <button class=" form-group btn btn-primary" >Salvar</button>
                    </form>

                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

        </div>
    </div>
</div>
                  
@stop


 
<!-- validação dos medicos -->
<script type="text/javascript">
    function habilitaBtn () {
        var op = document.getElementById("profile").value;

        if(op == "2") // Funcionário
        {
            document.getElementById('funcionario').style.display = 'block';            
            document.getElementById('cargo').required = true;
        }
        if(op == "1") // Administrador
        {
            document.getElementById('funcionario').style.display = 'none';            
            document.getElementById('cargo').required = false;
        }
        if(op == "3") // Cliente
        {
            document.getElementById('funcionario').style.display = 'none';            
            document.getElementById('cargo').required = false;
        }
    }
</script>