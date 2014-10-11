<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'mhc');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'f}9`+xRV}c-y*<4<I~rMv#[Lj...!.8%ddUM2F++o(q28jm~ikKs=Y[;Q4Xamwh|');
define('SECURE_AUTH_KEY',  '(]+1/GamSKw|zS OJ;ymL|xD3?sb0C2.4yMY|M-qc>EZg1985s0-zV|Ky5@Xto>.');
define('LOGGED_IN_KEY',    'oT%SV.Z2BPoP;7v1Gc[iaI%qSErt>} kN= uc+CD16Z!)GmXe]n<:GNu5-s|lmp,');
define('NONCE_KEY',        'lr6IwsufToHc-|i+|%=L//{,A_q/`xC.,+xoDn|}YS9C>M9OhLi&&EEkiI7+O?3`');
define('AUTH_SALT',        'LmuZyukXS^-Qwb`WyZ_5bbTd`2T)&m+ oK:u$t0YNB~PCO!RT(V(F$-W^6l-^PQh');
define('SECURE_AUTH_SALT', 'w,E8-Od9bo]K9F^+>cwAt714a`Y<9x`Av0!M*xbQuW[YS86(p/+e:C]+e!g-e8Up');
define('LOGGED_IN_SALT',   'SI*z1&kwiN!f65Y;Ka9<EOA!+b+-%|&h(J,Se;XO]+e/`QmL5{{SOZUW)tfKb %8');
define('NONCE_SALT',       'w;EcSw(e%RWCb+x9]tkV}-kT<e8B3-+fZ21`>_<1(tw#nQ0YQc6MJD0@1Uo2 I9D');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');