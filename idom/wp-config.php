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
define('DB_NAME', 'idom');

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
define('AUTH_KEY',         'n)A0yKF}m?ak__Cp[ux]-T]{DEnSCeg|o1+nJV4JLcNVYvPe=R;.&&Y|*S<oA|gM');
define('SECURE_AUTH_KEY',  'MOz6;7R)Qb#}^~qkC-JaDz4rQ+t}/g;3MUU]KmTs}OY{A|/T%VeD%ZTj| NOM=Up');
define('LOGGED_IN_KEY',    '|yT7h?^<]E!)Nt:0}F(KSA`4=_EF7]v7gc2LdB#n:Rawi,f|:#>,`M+h^Zr?iAiZ');
define('NONCE_KEY',        'VmIg<0c`?NpjQK>[y<6-yUy.G,;jbTUgEpn)*>^ZPd~FyyW$)AseRXeyBHGUSH8y');
define('AUTH_SALT',        '>4$!oVy]jq,x f)g,WL<1N+Z3+o|&~fK_46QJ!JVaO 3V4aLn:]@0SRKr:+7v${E');
define('SECURE_AUTH_SALT', 'GdZz~m0C-*Mj]!@EYj-mkH@AQ6r2;~t3<1}Evi=LE&V]WM&Rd5;[um<]~D{m$M:I');
define('LOGGED_IN_SALT',   'c@$uuIlP[};d7$mQP$1LU0}(cr$-G9{XHN?oIj+(g+OHPaupJ9V:Z{,y6Vb0.dW`');
define('NONCE_SALT',       ' y1%b{SHJczcTrR{6<-0FfV;|i8bHwwFiD+-l?A+_vYi1<EQSF}y;J F-zwz:Ipa');
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