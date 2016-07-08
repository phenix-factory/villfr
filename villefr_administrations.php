<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin Ville de france
 *
 * @plugin     Ville de france
 * @copyright  2015
 * @author     Phenix
 * @licence    GNU/GPL
 * @package    SPIP\Villefr\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}


/**
 * Fonction d'installation et de mise à jour du plugin Ville de france.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function villefr_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();

	$maj['create'] = array(
        array('maj_tables', array('spip_villes_frances', 'spip_villes_frances_liens')),
        array('peupler_base_villefr')
    );

	include_spip('base/upgrade');
    include_spip('base/villefr_peupler_base');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin Ville de france.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function villefr_vider_tables($nom_meta_base_version) {

	sql_drop_table('spip_villes_frances');
	sql_drop_table('spip_villes_frances_liens');
	effacer_meta($nom_meta_base_version);
}
