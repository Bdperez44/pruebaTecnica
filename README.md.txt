Prueba tecnica 30/08/2022

Para el correcto uso de la prueba tecnica se necesita xampp 3.3.0 php 8.1.6

Para crear registros se le da en el simbolo de + Para ver las ventas realizadas se le da en el simbolo de la personita Para realizar una compra se le da en el simbolo del carro de compras Si se desea editar eliminar o ver a detaller solo seleccionamos el registro deseado y nos habilitara las opciones deseadas.

Consultas solicitadas.

registro con mas stock: SELECT * FROM productos ORDER by stock DESC LIMIT 1; ordenamos el stock del mayor a menor y cogemos el primer registro osea el mayor

producto mas vendido: SELECT sum(v.cantidad) as suma, p.nombre_producto FROM ventas v, productos p WHERE p.id=v.producto GROUP by v.producto ORDER BY suma DESC LIMIT 1; En este caso realizamos la suma de los productos luego los agrupamos los ordenamos de mayor a menor y escogemos el primero el cual seria el producto mas vendido.