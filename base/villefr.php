<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Ville de belgique
 * @copyright  2015
 * @author     Phenix
 * @licence    GNU/GPL
 * @package    SPIP\Villefr\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function villefr_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['villes_frances'] = 'villes_frances';
	$interfaces['table_des_tables']['villes_frances_liens'] = 'villes_frances_liens';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function villefr_declarer_tables_objets_sql($tables) {

	$tables['spip_villes_frances'] = array(
		'type' => 'villes_france',
		'principale' => 'oui',
		'table_objet_surnoms' => array('villesfrance'), // table_objet('villes_france') => 'villes_frances'
		'field'=> array(
			'id_villes_france'    => 'bigint(21) NOT NULL',
			'code_postal'        => "varchar(5) NOT NULL DEFAULT ''",
			'nom'                => "varchar(255) NOT NULL DEFAULT ''",
			'region'           => "varchar(255) NOT NULL DEFAULT ''",
			'departement'           => "varchar(255) NOT NULL DEFAULT ''",
			'lat' => 'double NULL NULL',
			'lon' => 'double NULL NULL',
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_villes_france',
            'KEY code_postal'    => 'code_postal',
		),
		'titre' => "nom AS titre, '' AS lang",
		'champs_editables'  => array(),
		'champs_versionnes' => array(),
		'rechercher_champs' => array(),
		'tables_jointures'  => array('spip_villes_frances_liens')
	);

	return $tables;
}

function villefr_declarer_tables_auxiliaires($tables_auxiliaires) {

	$tables_auxiliaires['spip_villes_frances_liens'] = array(
		'field' => array(
			'id_villes_france' => 'bigint(21) NOT NULL',
			'objet' => "VARCHAR (25) DEFAULT '' NOT NULL",
			'id_objet' => 'bigint(21) NOT NULL'
		),
		'key' => array(
			'PRIMARY KEY' => 'id_villes_france,id_objet,objet',
			'KEY id_villes_france' => 'id_villes_france',
			'KEY id_objet' => 'id_objet',
			'KEY objet' => 'objet'
		)
	);

	return $tables_auxiliaires;
}
