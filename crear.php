<?php
	include 'sql/Conexion.php';
	include 'sql/Crud.php';
	
	$mensaje = null;
	if (isset($_POST['create'])){
		$codigo =  htmlspecialchars($_POST['codigo']);
		$descripcion = htmlspecialchars($_POST['descripcion']);
		$categoria = htmlspecialchars($_POST['categoria']);
		$precio = htmlspecialchars($_POST['precio']);
		
		if (!is_numeric($precio)) {
			$mensaje = "El campo precio deber ser numerico";
		}
		elseif ($codigo==""){
		 $mensaje = "Error el campo codigo es requerido!";
		}
		elseif($descripcion==''){
			$mensaje = "Error el campo descripcion es requerido";
		}
		else {
			$model = new Crud;
			$model->insertInto = 'Productos';
			$model->insertColumns = 'Codigo, Descripcion, Categoria, Precio';
			$model->insertValues = "'$codigo','$descripcion', '$categoria', $precio";
			$model->create();
			$mensaje = $model->mensaje;
		}
		
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv ="content-type" content = "text/html; charset = UTF-8">
</head>
<body>
	<h1>CRUD CREATE: Productos </h1>
	<strong><?php echo $mensaje; ?> </strong>
	<form method ="POST" action ="<?php echo $_SERVER['PHP_SELF'];?>">
		<table>
			<tr>
				<td>Codigo:</td>
				<td><input type ="text" name ="codigo" > </td>
			</tr>
			<tr>
				<td>Descripcion:</td>
				<td><textarea cols = "30" rows = "5" name ="descripcion"></textarea></td>
			</tr>
			<tr>
				<td>Categoria:</td>
				<td><input type = "text" name = "categoria" > </td>
			</tr>
			<tr>
				<td>Precio:</td>
				<td><input type = "text"  name ="precio" > </td>
			</tr>
			
		</table>
		<input type = "hidden" name = "create">
		<input type = "submit" value ="Enviar" >
	
	</form>
	</body>
</html>
