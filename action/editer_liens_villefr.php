<?php

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Lié une ville à un objet SPIP
 *
 * @param int $id_villebe
 * @param mixed $objet
 * @param mixed $id_objet
 * @access public
 * @return mixed
 */
function lier_villefr($id_villefr, $objet, $id_objet) {
	include_spip('action/editer_liens');

	$res = objet_associer(
		array('villes_france' => $id_villebe),
		array($objet => $id_objet)
	);

	return $res;
}
