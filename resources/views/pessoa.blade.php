<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/custom.css" />
    </head>
    <body>
    <!-- Modal Register -->
    @include('.forms._create')
    <!-- Modal Edit -->
    <div id="box-edit">
        @include('.forms._edit')
    </div>

    <div class="container">
        <div class="row main-container align-items-center">
            <div class="col middle-page">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegister">
                    Cadastrar nova pessoa
                </button>
                <button type="button" class="btn btn-danger" onclick="cleanTable()">
                    Limpar
                </button>
            @if(!$peoples->isEmpty())
                <table class="table mt-3 mt-md-4 table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data de nascimento</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Pais</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($peoples as $row)
                            <tr id="people-{{$row->id}}">
                                <td scope="row">{{ $i++ }}</td>
                                <td scope="row">{{ $row->nome }}</td>
                                <td>{{ date_format($row->nascimento, 'd/m/Y') }}</td>
                                <td>{{ getGen($row->genero) }}</td>
                                <td>{{ $row->pais->nome }}</td>
                                <td class="text-center">
                                    <button type="button" onclick="removePeople({{$row->id}})" class="btn btn-danger">
                                        Excluir
                                    </button>
                                    <button type="button" class="btn btn-info" onclick="getPeople({{$row->id}})" data-toggle="modal" data-target="#modalEdit">
                                        Editar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="mt-5 alert alert-warning">
                    Nenhuma Pessoa encontrada!
                </div>
                @endif
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/forms.js"></script>
</html>
