@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>

	{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre..." required>
            	</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Dirección</label>
				<input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" placeholder="Direccion">
            	</div>
		</div>



		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label>Documento</label>
				<select name="tipo_documento" class="form-control">
					<option value="CURP">CURP</option>
					<option value="RFC">RFC</option>
					<option value="INE">INE</option>
				</select>
            	</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="num_documento">Número de documento</label>
				<input type="text" name="num_documento" class="form-control" value="{{old('num_documento')}}" placeholder="Número de documento">
            	</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="tel" name="telefono" class="form-control" value="{{old('telefono')}}" placeholder="Teléfono..." >
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="email">Email</label>
            	<input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email...">
            </div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>
	</div>
	{!!Form::close()!!}
@endsection