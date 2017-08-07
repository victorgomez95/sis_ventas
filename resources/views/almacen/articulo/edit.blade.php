@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo: {{ $articulo->nombre}}</h3>
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

	{!!Form::model($articulo,['method'=>'PATCH','url'=>['almacen/articulo',$articulo->idarticulo],'files'=>'true'])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$articulo->nombre}}" required>
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="nombre">Categoría</label>
				<select name="idcategoria" class="form-control">
					@foreach($categoria as $cat)
						@if($cat->idcategoria == $articulo->idcategoria)
							<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
						@else
							<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
						@endif
					@endforeach
				</select>
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="codigo">Código</label>
            	<input type="text" name="codigo" class="form-control" value="{{$articulo->codigo}}" required>
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="stock">Stock</label>
            	<input type="text" name="stock" class="form-control" value="{{$articulo->stock}}" required>
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$articulo->descripcion}}" placeholder="Descripción del articulo...">
            </div>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control btn btn-primary"">
				
				@if(($articulo->imagen)!="")
					<div class="card" style="width: 20rem;">
						<img class="card-img-top" src="{{asset('imagenes/articulos/'.$articulo->imagen)}}"  height="100px" width="<10></10>0px" alt="Card image cap">
						<div class="card-block">
							<h4 class="card-title">{{$articulo->nombre}}</h4>
						</div>
					</div>
				@endif
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