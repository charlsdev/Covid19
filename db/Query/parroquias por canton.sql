SELECT
	cantones.ID_Canton,
	cantones.Canton,
	parroquias.ID_Parroquia,
	parroquias.Parroquia 
FROM
	cantones
	INNER JOIN parroquias ON cantones.ID_Canton = parroquias.ID_Canton 
WHERE
	cantones.ID_Canton = 'CAN01'