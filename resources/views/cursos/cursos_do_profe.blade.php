@extends('layouts.main')

@section('title','Cursos Ministrados')

@section('content')


@foreach($cursos as $C)
<table class="table table-striped table-hover table-bordered ">
<tbody>
<tr>

    <td class="text-break">{{ $C->Nome }}</td>
                    <td class="text-break">{{ $C->Tipo}}</td>
                        <td class="text-break">{{ $C->Resumo}}</td>


                        </tr>
                              @endforeach
                            </tbody>
                        </table>
















@endsection