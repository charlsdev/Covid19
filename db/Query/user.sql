SELECT
	`user`.cedula,
	`user`.apellidos_nombres,
	`user`.telefono,
	`user`.edad,
	`user`.sexo,
	`user`.nacionalidad,
	`user`.estado_civil,
	cantones.Canton,
	parroquias.Parroquia 
FROM
	`user`
	INNER JOIN cantones ON `user`.canton = cantones.ID_Canton
	INNER JOIN parroquias ON `user`.parroquia = parroquias.ID_Parroquia