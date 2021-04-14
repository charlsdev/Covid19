SELECT
	encuesta.Codigo,
	encuesta.Cedula,
	encuesta.Fecha,
	encuesta.Telefono,
	preguntas.Pregunta,
	resultado.Resultado,
	`user`.apellidos_nombres,
	`user`.telefono,
	`user`.edad,
	`user`.sexo,
	`user`.nacionalidad,
	`user`.estado_civil,
	`user`.parroquia,
	cantones.Canton,
	parroquias.Parroquia 
FROM
	encuesta
	INNER JOIN resultado ON encuesta.Codigo = resultado.Codigo
	INNER JOIN preguntas ON resultado.ID_Pregunta = preguntas.ID_Pregunta
	INNER JOIN `user` ON encuesta.Cedula = `user`.cedula
	INNER JOIN parroquias ON `user`.parroquia = parroquias.ID_Parroquia
	INNER JOIN cantones ON `user`.canton = cantones.ID_Canton 
WHERE
	encuesta.Codigo = 'ENC0002' 
	AND encuesta.Cedula = '1316650512'