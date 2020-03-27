CREATE TABLE `articulos` (
	`id` int(11) NOT NULL,
	`tipo` varchar(50) NOT NULL,
	`nombre` varchar(50) NOT NULL,
	`serial` varchar(50) NOT NULL,
	`marca` varchar (50) NOT NULL,
	`garantia` varchar(50) NOT NULL,
	`proveedor` varchar(50) NOT NULL,
	`cantidad` varchar(50) NOT NULL,
	`p_compra` varchar(50) NOT NULL,
	`p_venta` varchar(50) NOT NULL,
	`material` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `articulos`
	ADD PRIMARY KEY (`id`);
ALTER TABLE `articulos`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;