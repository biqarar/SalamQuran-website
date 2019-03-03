
UPDATE
	`salamquran_data`.`1_quran_ayat`
SET
	`salamquran_data`.`1_quran_ayat`.`word` =
	(
		SELECT
			COUNT(*)
		FROM
			`salamquran_data`.`1_quran_word`
		WHERE
			`salamquran_data`.`1_quran_word`.`sura` = `salamquran_data`.`1_quran_ayat`.`sura` AND
			`salamquran_data`.`1_quran_word`.`aya` = `salamquran_data`.`1_quran_ayat`.`aya` AND
			`salamquran_data`.`1_quran_word`.`char_type` = 'word'
	);