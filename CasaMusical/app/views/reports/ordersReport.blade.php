<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte de pedidos</title>
	<style>
	body{
		font-family: 'roboto', sans-serif;
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
		<table class="table-report">
			<tr>
				<th colspan = "5">Lista de pedidos</th>
			</tr>
			<tr>
				<th>Articulos</th>				
				<th>Precio</th>
				<th>Proveedor</th>
				<th>Direccion</th>
				<th>Tiempo de entrega</th>
			</tr>
			@foreach($products as $key => $product)
				<tr>
					<td>{{$product['product']}}</td>
					<td>{{$product['price']}}</td>
					<td>{{$product->getprovider['name']}}</td>
					<td>{{$product->getprovider['home']}}</td>
					<td>{{$product->getprovider['delivery_time']}}</td>
				</tr>
			@endforeach
		</table>
	</div>	
</body>
</html>