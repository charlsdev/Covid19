SELECT
	`user`.cedula,
	`user`.apellidos_nombres,
	`user`.telefono,
	`user`.edad,
	`user`.sexo,
	`user`.nacionalidad,
	`user`.estado_civil,
	cantones.Canton,
	parroquias.Parroquia,
	diagnostico.Codigo,
	diagnostico.Residencia,
	diagnostico.Direccion,
	diagnostico.Ocupacion,
	diagnostico.Afiliacion,
	diagnostico.Fecha,
	diagnostico.Motivo,
	diagnostico.Enfermedad,
	diagnostico.Ant_Patologicos,
	diagnostico.Ant_Quirurgicos,
	diagnostico.Ant_Alergicos,
	diagnostico.Ant_Familiares,
	diagnostico.Estilo_Vida,
	diagnostico.Habitos,
	diagnostico.Medio_Ambiente,
	diagnostico.Historial_Laboral,
	diagnostico.Descripcion_General,
	diagnostico.Resumen_Diagnostico,
	diagnostico.Diagnostico_Pres,
	diagnostico.Tratamiento,
	diagnostico.Observacion 
FROM
	`user`
	INNER JOIN cantones ON `user`.canton = cantones.ID_Canton
	INNER JOIN parroquias ON `user`.parroquia = parroquias.ID_Parroquia
	INNER JOIN diagnostico ON diagnostico.Cedula = `user`.cedula