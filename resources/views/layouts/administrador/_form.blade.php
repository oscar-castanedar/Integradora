@csrf
<label for="title">Nombre</label>
<input name="nombre" id="nombre" type="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}"required>

<label for="primer_apellido">Primer Apellido</label>
<input name="primer_apellido" id="primer_apellido" type="text" class="form-control" value="{{ old('primer_apellido', $usuario->primer_apellido) }}"required>

<label for="segundo_apellido">Segundo Apellido</label>
<input name="segundo_apellido" id="segundo_apellido" type="text" class="form-control" value="{{ old('segundo_apellido', $usuario->segundo_apellido) }}"required>

<label for="email">Email</label>
<input name="email" id="email" type="text"pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" value="{{ old('email', $usuario->email) }}"required>

<label for="institucion">Institucion</label>  <br>
        <select class="form-control" name="institucion" aria-label="Default select example" name="institucion" value="{{ old('institucion', $usuario->institucion) }}" required >
        @foreach($ins as $i)
      <option selected>{{$i->nombre_institucion}}</option>
      @endforeach
      </select><br>

<label for="semestre">Semestre</label>


            <select class="form-control" id="semestre" name="semestre" value="{{ old('semestre', $usuario->semestre)}}" required>
                <option selected value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        

</textarea>




