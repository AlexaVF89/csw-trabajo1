<?php
/* 
ALUMNA:     ALEJANDRA VALLEJO FERNÁNDEZ
MAESTRO:    OCTAVIO AGUIRRE LOZANO
ASIGNATURA: COMPUTACIÓN EN EL SERVIDOR WEB
ACTIVIDAD:  DESARROLLO DE UNA PÁGINA WEB USANDO PHP

>> SEGUNDA PARTE DEL EJERCICIO <<
*/
?>

<html>
    <head>
        <title>Ejercicios con PHP</title>
    </head>
    <body>
    <h3>Por favor imprima este cupón y preséntelo en su siguiente compra:</h3>
        <?php  
        //declaración de variables:
        $nombre = $_POST['nombre'];
        $no_compra = $_POST['no_compra'];
        $promocion = $_POST['no_promocion'];
        $sabor = $_POST['sabor'];
        $tamano = $_POST['tamano'];
        $resultados = "";
        $precio = 0;
        $descuento = 0;
        $gasto_envio = 10;
        $total = 0;
        $i=0;

        echo "----------------------------------------------------------------------<br/>";

        //funcion de cadena
        //función que devuelve el nombre del cliente en mayúsculas 
        function nombre_completo($nombre){
            $nombre = (strtoupper($nombre));
            return $nombre;
        }
        echo "Nombre del cliente: " . nombre_completo($nombre);   
        //se muestra el número de compra o referencia     
        echo "<br/> Número de referencia: [" . $no_compra . "] <br/>
        ----------------------------------------------------------------------- <br/>";        
        echo "PRECIOS ESPECIALES: <br/>";

        //función que calcula el monto del descuento y el costo total a pagar
        //y lo muestra en pantalla
        function resultados($precio, $descuento, $gasto_envio, $promocion){
            echo "Precio: <strong>$".$precio."</strong><br/>";
            $descuento = ($descuento*$precio)/100;
            echo "Descuento: <strong>$".$descuento."</strong><br/>";
            echo "Envío: <strong>$".$gasto_envio."</strong><br/>";
            echo "<strong>TOTAL: $". ($precio - $descuento + $gasto_envio)."</strong>"; 
            if($promocion=="Promocion 5"){ echo "<br/>*Costo total aplicable a su segunda compra
            <br/>en pizzas de igual o diferente sabor";} 
        }
       
        //array, sentencias de control - estructuras condicionales e iterativas-
        //array que almacena los tamaños disponibles de la pizza
        $array_tamano = array("Individual", "Grande", "Familiar", "Jumbo");
            //recorre cada elemento del array
            for($i==0; $i< count($array_tamano); $i++){
                //para cada else if, imprime el costo de la pizza según el tamaño
                if($array_tamano[$i]=="Individual"){ 
                    echo "Tamaño $array_tamano[$i]   $35<br/>";
                        //sentencias que determinan el precio, el valor del descuento
                        //y gastos de envío según el tamaño de la pizza 
                        if($array_tamano[$i]==$tamano){$precio=35;}
                        if($promocion=="Promocion 4"){$gasto_envio=0;}
                        if($promocion=="Promocion 2"){$descuento=10;}
                        if($promocion=="Promocion 3"){$descuento=15;}
                        if($promocion=="Promocion 5"){$descuento=20;}                                                                
                } else
                if($array_tamano[$i]=="Grande"){ echo "Tamaño $array_tamano[$i]   $85<br/>"; 
                    if($array_tamano[$i]==$tamano){$precio=85;}
                    if($promocion=="Promocion 4"){$gasto_envio=0;}
                    if($promocion=="Promocion 2"){$descuento=10;}
                    if($promocion=="Promocion 3"){$descuento=15;}
                    if($promocion=="Promocion 5"){$descuento=20;}  
                } else
                if($array_tamano[$i]=="Familiar"){ echo "Tamaño $array_tamano[$i]   $110<br/>"; 
                    if($array_tamano[$i]==$tamano){$precio=110;}
                    if($promocion=="Promocion 4"){$gasto_envio=0;}
                    if($promocion=="Promocion 2"){$descuento=10;}
                    if($promocion=="Promocion 3"){$descuento=15;}
                    if($promocion=="Promocion 5"){$descuento=20;}  
                } else
                if($array_tamano[$i]=="Jumbo"){ echo "Tamaño $array_tamano[$i]   $220<br/>"; 
                    if($array_tamano[$i]==$tamano){$precio=220;}
                    if($promocion=="Promocion 4"){$gasto_envio=0;}
                    if($promocion=="Promocion 2"){$descuento=10;}
                    if($promocion=="Promocion 3"){$descuento=15;}
                    if($promocion=="Promocion 5"){$descuento=20;}  
                } 
            }

        //estructuras condicionales
        //evalúa si el usuario eligió una opción válida de la lista del número de promoción
        if($promocion=="Seleccione"){
            echo "<br/><strong>Usted no ha seleccionado una promoción válida</strong><br/>"; 
            $gasto_envio=0; $precio=0;
        } else {
            echo "<br/>Usted obtuvo la  <strong>". $promocion .":</strong>";
        }
    
        //muestra en pantalla la descripción del número de promoción correspondiente
        switch($promocion){
            case "Promocion 1": echo "<h3>Refresco GRATIS</h3>"; break;
            case "Promocion 2": echo "<h3>DESCUENTO del 10%</h3>"; break;
            case "Promocion 3": echo "<h3>DESCUENTO del 15%</h3>"; break;
            case "Promocion 4": echo "<h3>Envío GRATIS a domicilio</h3>"; break;
            case "Promocion 5": echo "<h3>Segunda pizza con 20% de DESCUENTO</h3>"; break;
            default: echo " Consulte promociones y vigencia en sucursales participantes <br/><br/>";            
        }

        //evalúa si el usuario eligió una opción válida de la lista del sabor de la pizza
        echo "----------------------------------------------------------------------<br/>";
        if($sabor !== "Seleccione"){
            echo "Pizza: <strong>" . $sabor . "</strong><br/>";
        } else { echo "Usted no ha seleccionado una opción válida. <br/>"; $gasto_envio=0;
        }

        //evalúa si el usuario eligió una opción válida de la lista del tamaño de la pizza
        if($tamano !== "Seleccione"){
            echo "Tamaño: <strong>" . $tamano . "</strong><br/>";
        } else { echo "Usted no ha seleccionado una opción válida. <br/>"; $gasto_envio=0;
        }

        //llama a la función 'resultados' para mostrar los precios finales
        resultados($precio, $descuento, $gasto_envio, $promocion);
        echo "<br/>----------------------------------------------------------------------<br/>";
        
        /* Referencias
        Plataforma de Teleformación de IFES (2012). Programación en PHP
        https://issuu.com/aulacero21/docs/programaci_n_en_php 
        
        https://aprende-web.net/php/php3_1.php
        */
        ?>
    </body>
</html>