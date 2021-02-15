    {!! Form::model($people, ['route'=> ['pessoa.update', $people->id], 'id' => 'fEdit', 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Seu nome') !!}
            {!! Form::text('nome', null, ['class'=> 'form-control', 'required' => true, 'maxlength' => 255, 'placeholder' => 'Informe seu nome *']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nascimento', 'Data de nascimento *') !!}
            {!! Form::date('nascimento', $people->nascimento, ['class'=> 'form-control', 'required' => true, 'maxlength' => 255, 'placeholder' => 'Data de nascimento *']) !!}
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
