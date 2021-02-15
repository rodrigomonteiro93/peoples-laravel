    <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegister" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar nova pessoa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'pessoa.store', 'id' => 'fRegister']) !!}
                        <div class="form-group">
                            {!! Form::label('nome', 'Seu nome') !!}
                            {!! Form::text('nome', null, ['class'=> 'form-control', 'required' => true, 'maxlength' => 255, 'placeholder' => 'Informe seu nome *']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nascimento', 'Data de nascimento *') !!}
                            {!! Form::date('nascimento', null, ['class'=> 'form-control', 'required' => true, 'maxlength' => 255, 'placeholder' => 'Data de nascimento *']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('genero', 'Gênero') !!}
                            {!! Form::select('genero', array(null => 'Não informado', 'm' => 'Masculino', 'f' => 'Feminino'), null, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('pais_id', 'País *') !!}
                            {!! Form::select('pais_id', $states, null, ['class'=> 'form-control', 'required' => true]) !!}
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <div class="form-group box-alert"></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
