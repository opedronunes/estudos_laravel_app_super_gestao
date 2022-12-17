{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input type="text" value="{{ old('nome') }}" placeholder="Nome" class="{{ $classe }}" name="nome">
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input type="text" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}" name="telefone">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input type="text" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}" name="email">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select class="{{ $classe }}" name="motivo_contatos_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $item => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contato_id') == $motivo_contato->id ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea class="{{ $classe }}" name="mensagem">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
@if ($errors->any())
    <div style="position: absolute; top:0px; left:0px; width:100%; background:red">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
        @endforeach
    </div>
@endif
