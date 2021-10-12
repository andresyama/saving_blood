<?php
include "conexion.php";  // Conexi�n tiene la informaci�n sobre la conexi�n de la base de datos.
$mysqli = new mysqli($host, $user, $pw, $db); // Aqu� se hace la conexi�n a la base de datos.

// LAs siguientes son l�neas de c�digo HTML simple, para crear una p�gina web
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 	Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
    <head>
      <title> Datos de temperatura y humedad
		  </title>
      <meta http-equiv="refresh" content="15" />
    </head>
    <body>

    
    <nav valign="top" align=center>
            <a href="/ubicuos/interfaces/programa6.php">Alertas de temperatura</a>
            <a href="/ubicuos/interfaces/programa2.php">Datos temperatura</a>
            <a href="/ubicuos/interfaces/programa3.php">Filtro</a>
            <a href="/ubicuos/interfaces/programa4.php">Ajuste temperatura</a>
    </nav>

      <table width="80%" align=center cellpadding=5 border=0 bgcolor="#FFFFFF">
    	 <tr>
         <td valign="top" align=center width=80& colspan=6 bgcolor="#FFFFF">
           <img src="img/invernadero.jpg" width=800 height=250>
         </td>
 	     </tr>
 	     <tr>
         <td valign="top" align=center width=80& colspan=6 bgcolor=#cd200f">
           <h1> <font color=white>Temperaturas medidas</font></h1>
         </td>
 	     </tr>
    	 <tr>
         <td valign="top" align=center bgcolor="#E1E1E1">
            <b>#</b>
         </td>

         <td valign="top" align=center bgcolor="#E1E1E1">
            <b>Fecha</b>
         </td>
         <td valign="top" align=center bgcolor="#E1E1E1">
            <b>Hora</b>
         </td>
         <td valign="top" align=center bgcolor="#E1E1E1">
            <b>Temperatura</b>
         </td>
         <td valign="top" align=center bgcolor="#E1E1E1">
            <b>Humedad</b>
         </td>
 	     </tr>
<?php
// la siguiente linea almacena en una variable denominada sql1, la consulta en lenguaje SQL que quiero realizar a la base de datos. Se consultan los datos de la tarjeta 1, porque en la tabla puede haber datos de diferentes tarjetas.
$sql1 = "SELECT * from datos_medidos where ID_TARJ=3 order by id"; // Aqu� se ingresa el valor recibido a la base de datos.
// la siguiente l�nea ejecuta la consulta guardada en la variable sql, con ayuda del objeto de conexi�n a la base de datos mysqli
$result1 = $mysqli->query($sql1);
// la siguiente linea es el inicio de un ciclo while, que se ejecuta siempre que la respuesta a la consulta de la base de datos
// tenga alg�n registro resultante. Como la consulta arroja 5 resultados, los �ltimos que tenga la tabla, se ejecutar� 5 veces el siguiente ciclo while.
// el resultado de cada registro de la tabla, se almacena en el arreglo row, row[0] tiene el dato del 1er campo de la tabla, row[1] tiene el dato del 2o campo de la tabla, as� sucesivamente
$contador = 0;
while($row1 = $result1->fetch_array(MYSQLI_NUM))
{
 $temp = $row1[2];
 $hum = $row1[3];
 $fecha = $row1[4];
 $hora = $row1[5];
 $contador++;
?>
    	 <tr>
         <td valign="top" align=center>
           <?php echo $contador; ?> 
         </td>
         <td valign="top" align=center>
           <?php echo $fecha; ?> 
         </td>
         <td valign="top" align=center>
           <?php echo $hora; ?> 
         </td>
         <td valign="top" align=center>
           <?php echo $temp." °C"; ?> 
         </td>
         <td valign="top" align=center>
           <?php echo $hum." %"; ?> 
         </td>
 	     </tr>
<?php
}
?>
     </body>
   </html>