<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>	
			Catalogo de productos
	</title>
	<style>
		body{
			font-family: 'roboto', sans-serif;
			font-size: 11px;
		}
		.table-report{
			border-collapse: collapse;
			padding: 5px;				
		}
		.table-report td,th{
			border-collapse: collapse;
			text-align: center;
			border: 1px solid #aaa;			
		}
		.table-report tr:nth-child(even){
			background: #eee;
		}
		.table-report tr:first-child{
			background: #aaa;
		}
	</style>
</head>
<body>
	<h2>Productos en existencia</h2>	
	<table class="table-report" width="100%">	
		<tr>	
			<th>#</th>
			<th>Reserva</th>			
			<th>Art&iacute;culos</th>				
			<th>Precio</th>
			<th>Proveedor</th>
		</tr>
		@foreach($data as $key=>$product)
		<tr>			
			<td>{{$key + 1}}</td>				
			<td>{{$product['reserve']}}</td>
			<td>{{$product['product']}}</td>
			<td>${{number_format($product['price'],2,'.',',')}}</td>
			<td>{{$product['name']}}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>