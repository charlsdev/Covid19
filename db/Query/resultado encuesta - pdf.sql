SELECT
		encuesta.Codigo,
		encuesta.Cedula,
		encuesta.Fecha,
		encuesta.Telefono,
		preguntas.Pregunta,
		resultado.Resultado 
FROM
		encuesta
		INNER JOIN resultado ON encuesta.Codigo = resultado.Codigo
		INNER JOIN preguntas ON resultado.ID_Pregunta = preguntas.ID_Pregunta 
WHERE
	encuesta.Codigo = 'ENC0002' 
	AND encuesta.Cedula = '1316650512'