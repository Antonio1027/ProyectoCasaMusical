<!DOCTYPE html>
<html lang="en">
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>Reporte de pedidos</title>
	<style>	
		body{
			font-family: 'roboto', sans-serif;			
			font-size: 11px;
			text-align: center;
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
		<h2>Lista de pedidos</h2>
		@foreach($data as $key => $provider)
			@if(count($provider['getproducts']))
				<h4>{{$provider['name']}}</h1>
				<table class="table-report" width="100%">			
					<tr>
						<th>#</th>
						<th>Reserva</th>
						<th>Articulos</th>
						<th>Modelo</th>
						<th>Precio</th>												
					</tr>				
					@foreach($provider['getproducts'] as $key => $product)
						<tr>
							<td width="10%">{{$key + 1}}</td>		
							<td width="10%">{{$product['reserve']}}</td>
							<td width="50%">{{$product['product']}}</td>
							<td width="20%">{{$product['model']}}</td>
							<td width="10%">${{number_format($product['price_sale'],2,'.',',')}}</td>																		
						</tr>
					@endforeach
				</table>
			@endif
		@endforeach
	</div>	
</body>
</html>