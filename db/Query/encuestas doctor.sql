SELECT
	encuesta.Codigo,
	encuesta.Cedula,
	`user`.apellidos_nombres,
	encuesta.Fecha,
	encuesta.Telefono 
FROM
	encuesta
	INNER JOIN `user` ON `user`.cedula = encuesta.Cedula