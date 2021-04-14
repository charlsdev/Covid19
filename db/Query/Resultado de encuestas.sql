SELECT
	resultado.Codigo,
	resultado.ID_Pregunta,
	preguntas.Pregunta,
	resultado.Resultado 
FROM
	preguntas
	INNER JOIN resultado ON resultado.ID_Pregunta = preguntas.ID_Pregunta 
WHERE
	resultado.Codigo = 'ENC0001'