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
define('DB_NAME', 'pecheurs');

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
define('AUTH_KEY',         '}[Ym(c8pn-yWD`1/yI&;eEq.6/Awa(g(,/O9ZD4yUOG):TOnnk=QO^(j;a0T^;c^');
define('SECURE_AUTH_KEY',  'QYKx(X_4DqEnI)-H$uu##>t!$4t2R,,+c,FL&G?6[gmr( [Cw0;kAc=J]Q)RhU~f');
define('LOGGED_IN_KEY',    'MG@.Ju#MWG5VKDv]EP+mHrG;wIuv)(p$_<?C5rH{!-Ya[p(AF>uZ+1+C=0`{:Fto');
define('NONCE_KEY',        '!1!W0qF@b*Edx?B+_3FuFtx1|q`,SSr[CqlD^aD61^O&t%XNXY*J.X!2M 5n8{CC');
define('AUTH_SALT',        '4uKLq1!Vsvwt&XioJ}GzFZVMuqW!!rGO$i0LK,2ytBJ$U]Ip?neIa=r8HAm|.xrf');
define('SECURE_AUTH_SALT', 'p2tE&x|Xhd2W<IKuMxne1:O`}|H?4F_4jHOYUg;G>:VaPW`m1$?3!<Rtybe:G|_)');
define('LOGGED_IN_SALT',   '?bsX2fO0#>?@-@voH%4,~c-5F<v(.so1)`c-brU<0<bR6aDCIw{cFMbRfTYua&5m');
define('NONCE_SALT',       '`hv(Ch;Vu`w]qS-o,koU`=KuyIy9)nCuWM3]eRuP@~#O/+a?!:p@Y&OXSC:6sh4m');
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