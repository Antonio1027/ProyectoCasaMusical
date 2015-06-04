<!DOCTYPE html>
<html lang="en">
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>Reporte de pedidos</title>
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
	<div class="container">
		<table class="table-report" width="100%">
			<tr>
				<th colspan = "6">Lista de pedidos</th>
			</tr>
			<tr>
				<th>#</th>
				<th>Reserva</th>
				<th>Articulos</th>
				<th>Precio</th>
				<th>Proveedor</th>				
				<th>Tiempo de entrega</th>
			</tr>
			@foreach($data as $key => $product)
				<tr>
					<td>{{$key + 1}}</td>
					<td>{{$product['reserve']}}</td>
					<td>{{$product['product']}}</td>
					<td>${{number_format($product['price'],2,'.',',')}}</td>
					<td>{{$product['name']}}</td>					
					<td>{{$product['delivery_time']}}</td>
				</tr>
			@endforeach
		</table>
	</div>	
</body>
</html>