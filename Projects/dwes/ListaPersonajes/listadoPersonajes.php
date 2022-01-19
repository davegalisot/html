<?php
session_start();//Inicio sesión

$paises = array(
    'AF' => 'Afghanistan',
    'AX' => '&Aring;land Islands',
    'AL' => 'Albania',
    'DZ' => 'Algeria',
    'AS' => 'American Samoa',
    'AD' => 'Andorra',
    'AO' => 'Angola',
    'AI' => 'Anguilla',
    'AG' => 'Antigua and Barbuda',
    'AR' => 'Argentina',
    'AM' => 'Armenia',
    'AW' => 'Aruba',
    'AU' => 'Australia',
    'AT' => 'Austria',
    'AZ' => 'Azerbaijan',
    'BS' => 'Bahamas',
    'BH' => 'Bahrain',
    'BD' => 'Bangladesh',
    'BB' => 'Barbados',
    'BY' => 'Belarus',
    'BE' => 'Belgium',
    'BZ' => 'Belize',
    'BJ' => 'Benin',
    'BM' => 'Bermuda',
    'BT' => 'Bhutan',
    'BO' => 'Bolivia (Plurinational State of)',
    'BA' => 'Bosnia and Herzegovina',
    'BW' => 'Botswana',
    'BV' => 'Bouvet Island',
    'BR' => 'Brazil',
    'IO' => 'British Indian Ocean Territory',
    'BN' => 'Brunei Darussalam',
    'BG' => 'Bulgaria',
    'BF' => 'Burkina Faso',
    'BI' => 'Burundi',
    'KH' => 'Cambodia',
    'CV' => 'Cabo Verde',
    'CM' => 'Cameroon',
    'CA' => 'Canada',
    'CT' => 'Catalonia',
    'KY' => 'Cayman Islands',
    'CF' => 'Central African Republic',
    'TD' => 'Chad',
    'CL' => 'Chile',
    'CN' => 'China',
    'CX' => 'Christmas Island',
    'CC' => 'Cocos (Keeling) Islands',
    'CO' => 'Colombia',
    'KM' => 'Comoros',
    'CD' => 'Congo',
    'CG' => 'Congo',
    'CK' => 'Cook Islands',
    'CR' => 'Costa Rica',
    'CI' => 'C&ocirc;te d\'Ivoire',
    'HR' => 'Croatia',
    'CU' => 'Cuba',
    'CY' => 'Cyprus',
    'CZ' => 'Czech Republic',
    'DK' => 'Denmark',
    'DJ' => 'Djibouti',
    'DM' => 'Dominica',
    'DO' => 'Dominican Republic',
    'EC' => 'Ecuador',
    'EG' => 'Egypt',
    'SV' => 'El Salvador',
    'EN' => 'England',
    'GQ' => 'Equatorial Guinea',
    'ER' => 'Eritrea',
    'EE' => 'Estonia',
    'ET' => 'Ethiopia',
    'EU' => 'European Union',
    'FK' => 'Falkland Islands',
    'FO' => 'Faroe Islands',
    'FJ' => 'Fiji',
    'FI' => 'Finland',
    'FR' => 'France',
    'GF' => 'French Guiana',
    'PF' => 'French Polynesia',
    'TF' => 'French Southern Territories',
    'GA' => 'Gabon',
    'GM' => 'Gambia',
    'GE' => 'Georgia',
    'DE' => 'Germany',
    'GH' => 'Ghana',
    'GI' => 'Gibraltar',
    'GR' => 'Greece',
    'GL' => 'Greenland',
    'GD' => 'Grenada',
    'GP' => 'Guadeloupe',
    'GU' => 'Guam',
    'GT' => 'Guatemala',
    'GN' => 'Guinea',
    'GW' => 'Guinea-Bissau',
    'GY' => 'Guyana',
    'HT' => 'Haiti',
    'HM' => 'Heard Island and McDonald Islands',
    'VA' => 'Holy See',
    'HN' => 'Honduras',
    'HK' => 'Hong Kong',
    'HU' => 'Hungary',
    'IS' => 'Iceland',
    'IN' => 'India',
    'ID' => 'Indonesia',
    'IR' => 'Iran',
    'IQ' => 'Iraq',
    'IE' => 'Ireland',
    'IL' => 'Israel',
    'IT' => 'Italy',
    'JM' => 'Jamaica',
    'JP' => 'Japan',
    'JO' => 'Jordan',
    'KZ' => 'Kazakhstan',
    'KE' => 'Kenya',
    'KI' => 'Kiribati',
    'KP' => 'Korea',
    'KR' => 'Korea',
    'KW' => 'Kuwait',
    'KG' => 'Kyrgyzstan',
    'LA' => 'Lao People\'s Democratic Republic',
    'LV' => 'Latvia',
    'LB' => 'Lebanon',
    'LS' => 'Lesotho',
    'LR' => 'Liberia',
    'LY' => 'Libya',
    'LI' => 'Liechtenstein',
    'LT' => 'Lithuania',
    'LU' => 'Luxembourg',
    'MO' => 'Macao',
    'MK' => 'Macedonia',
    'MG' => 'Madagascar',
    'MW' => 'Malawi',
    'MY' => 'Malaysia',
    'MV' => 'Maldives',
    'ML' => 'Mali',
    'MT' => 'Malta',
    'MH' => 'Marshall Islands',
    'MQ' => 'Martinique',
    'MR' => 'Mauritania',
    'MU' => 'Mauritius',
    'YT' => 'Mayotte',
    'MX' => 'Mexico',
    'FM' => 'Micronesia',
    'MD' => 'Moldova',
    'MC' => 'Monaco',
    'MN' => 'Mongolia',
    'ME' => 'Montenegro',
    'MS' => 'Montserrat',
    'MA' => 'Morocco',
    'MZ' => 'Mozambique',
    'MM' => 'Myanmar',
    'NA' => 'Namibia',
    'NR' => 'Nauru',
    'NP' => 'Nepal',
    'NL' => 'Netherlands',
    'AN' => 'Netherlands Antilles',
    'NC' => 'New Caledonia',
    'NZ' => 'New Zealand',
    'NI' => 'Nicaragua',
    'NE' => 'Niger',
    'NG' => 'Nigeria',
    'NU' => 'Niue',
    'NF' => 'Norfolk Island',
    'MP' => 'Northern Mariana Islands',
    'NO' => 'Norway',
    'OM' => 'Oman',
    'PK' => 'Pakistan',
    'PW' => 'Palau',
    'PS' => 'Palestine, State of',
    'PA' => 'Panama',
    'PG' => 'Papua New Guinea',
    'PY' => 'Paraguay',
    'PE' => 'Peru',
    'PH' => 'Philippines',
    'PN' => 'Pitcairn',
    'PL' => 'Poland',
    'PT' => 'Portugal',
    'PR' => 'Puerto Rico',
    'QA' => 'Qatar',
    'RE' => 'R&eacute;union',
    'RO' => 'Romania',
    'RU' => 'Russian Federation',
    'RW' => 'Rwanda',
    'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
    'KN' => 'Saint Kitts and Nevis',
    'LC' => 'Saint Lucia',
    'PM' => 'Saint Pierre and Miquelon',
    'VC' => 'Saint Vincent and the Grenadines',
    'WS' => 'Samoa',
    'SM' => 'San Marino',
    'ST' => 'Sao Tome and Principe',
    'SA' => 'Saudi Arabia',
    'AB' => 'Scotland',
    'SN' => 'Senegal',
    'RS' => 'Serbia',
    'CS' => 'Serbia and Montenegro',
    'SC' => 'Seychelles',
    'SL' => 'Sierra Leone',
    'SG' => 'Singapore',
    'SK' => 'Slovakia',
    'SI' => 'Slovenia',
    'SB' => 'Solomon Islands',
    'SO' => 'Somalia',
    'ZA' => 'South Africa',
    'GS' => 'South Georgia and the South Sandwich Islands',
    'ES' => 'Spain',
    'LK' => 'Sri Lanka',
    'SD' => 'Sudan',
    'SR' => 'Suriname',
    'SJ' => 'Svalbard and Jan Mayen',
    'SZ' => 'Swaziland',
    'SE' => 'Sweden',
    'CH' => 'Switzerland',
    'SY' => 'Syrian Arab Republic',
    'TW' => 'Taiwan (Province of China)',
    'TJ' => 'Tajikistan',
    'TZ' => 'Tanzania, United Republic of',
    'TH' => 'Thailand',
    'TL' => 'Timor-Leste',
    'TG' => 'Togo',
    'TK' => 'Tokelau',
    'TO' => 'Tonga',
    'TT' => 'Trinidad and Tobago',
    'TN' => 'Tunisia',
    'TR' => 'Turkey',
    'TM' => 'Turkmenistan',
    'TC' => 'Turks and Caicos Islands',
    'TV' => 'Tuvalu',
    'UG' => 'Uganda',
    'UA' => 'Ukraine',
    'AE' => 'United Arab Emirates',
    'GB' => 'United Kingdom of Great Britain and Northern Ireland',
    'UM' => 'United States Minor Outlying Islands',
    'US' => 'United States of America',
    'UY' => 'Uruguay',
    'UZ' => 'Uzbekistan',
    'VU' => 'Vanuatu',
    'VE' => 'Venezuela (Bolivarian Republic of)',
    'VN' => 'Viet Nam',
    'VG' => 'Virgin Islands (British)',
    'VI' => 'Virgin Islands (U.S.)',
    'WA' => 'Wales',
    'WF' => 'Wallis and Futuna',
    'EH' => 'Western Sahara',
    'YE' => 'Yemen',
    'ZM' => 'Zambia',
    'ZW' => 'Zimbabwe'
);//Array con los paises.

$personajes = array (
    array(
        "nombre" => "Jim",
        "apellidos" => "Carrey",
        "lugar" =>"Newmarket, Ontario",
        "pais" => "US",
        "imdb" => "0000120",
        "fechaNacimiento" => "17/01/1962",
        "foto" => "JCarrey"
    ),
    array(
        "nombre" => "Dwayne",
        "apellidos" => "Johnson",
        "lugar" =>"Hayward, California",
        "pais" => "US",
        "imdb" => "0425005",
        "fechaNacimiento" => "02/05/1972",
        "foto" => "DJohnson"
    ),
    array(
        "nombre" => "Rowan",
        "apellidos" => "Atkinson",
        "lugar" => "Consett, County Durham",
        "pais" => "EN",
        "imdb" => "0000100",
        "fechaNacimiento" => "06/01/1955",
        "foto" => "RAtkinson"
    ),
    array(
        "nombre" => "Pepe",
        "apellidos" => "Viyuela",
        "lugar" => "Logroño, La Rioja",
        "pais" => "ES",
        "imdb" => "0900402",
        "fechaNacimiento" => "02/06/1963",
        "foto" => "PViyuela"
    ),
    array(
        "nombre" => "Gérard",
        "apellidos" => "Depardieu",
        "lugar" => "Châteauroux, Indre",
        "pais" => "FR",
        "imdb" => "0000367",
        "fechaNacimiento" => "27/12/1948",
        "foto" => "GDepardieu"
    ),
    array(
        "nombre" => "Jackie",
        "apellidos" => "Chan",
        "lugar" => "Victoria Peak, Hong Kong",
        "pais" => "CN",
        "imdb" => "0000329",
        "fechaNacimiento" => "07/03/1954",
        "foto" => "JChan"
    ),
    array(
        "nombre" => "Dani",
        "apellidos" => "Rovira",
        "lugar" => "Málaga, Andalucía",
        "pais" => "ES",
        "imdb" => "3657043",
        "fechaNacimiento" => "01/11/1980",
        "foto" => "DRovira"
    ),
    array(
        "nombre" => "Carmen",
        "apellidos" => "Machí",
        "lugar" => "Madrid Capital",
        "pais" => "ES",
        "imdb" => "1197737",
        "fechaNacimiento" => "21/09/1963",
        "foto" => "CMachi"
    ),
    array(
        "nombre" => "Emilia",
        "apellidos" => "Clarke",
        "lugar" => "London",
        "pais" => "EN",
        "imdb" => "3592338",
        "fechaNacimiento" => "23/08/1986",
        "foto" => "EClarke"
    ),
    array(
        "nombre" => "Tom",
        "apellidos" => "Hardy",
        "lugar" => "Hammersmith, London",
        "pais" => "EN",
        "imdb" => "",
        "fechaNacimiento" => "15/09/1977",
        "foto" => "THardy"
    ),
    array(
        "nombre" => "Christian",
        "apellidos" => "Bale",
        "lugar" => "Haverfordwest, Pembrokeshire",
        "pais" => "WA",
        "imdb" => "0000288",
        "fechaNacimiento" => "30/01/1974",
        "foto" => "CBale"
    ),
    array(
        "nombre" => "Kevin",
        "apellidos" => "Spacey",
        "lugar" => "South Orange, New Jersey",
        "pais" => "US",
        "imdb" => "",
        "fechaNacimiento" => "26/06/1959",
        "foto" => "KSpacey"
    ),
    array(
        "nombre" => "Jennifer",
        "apellidos" => "Lawrence",
        "lugar" => "Louisville, Kentucky",
        "pais" => "US",
        "imdb" => "",
        "fechaNacimiento" => "15/08/1990",
        "foto" => "JLawrence"
    ),
    array(
        "nombre" => "Patrick",
        "apellidos" => "Stewart",
        "lugar" => "Mirfield, Yorkshire",
        "pais" => "EN",
        "imdb" => "",
        "fechaNacimiento" => "13/06/1940",
        "foto" => "PStewart"
    ),
    array(
        "nombre" => "Hugh",
        "apellidos" => "Jackman",
        "lugar" => "Sydney, New South Wales",
        "pais" => "AU",
        "imdb" => "",
        "fechaNacimiento" => "12/10/1968",
        "foto" => "HJackman"
    ),
    array(
        "nombre" => "Idris",
        "apellidos" => "Elba",
        "lugar" => "London",
        "pais" => "EN",
        "imdb" => "",
        "fechaNacimiento" => "06/09/1972",
        "foto" => "IElba"
    ),
    array(
        "nombre" => "Christoph",
        "apellidos" => "Waltz",
        "lugar" => "Vienna",
        "pais" => "AU",
        "imdb" => "0910607",
        "fechaNacimiento" => "04/10/1956",
        "foto" => "CWaltz"
    ),
    array(
        "nombre" => "Penelope",
        "apellidos" => "Cruz",
        "lugar" => "Alcobendas, Madrid",
        "pais" => "ES",
        "imdb" => "0004851",
        "fechaNacimiento" => "28/04/1974",
        "foto" => "PCruz"
    ),
    array(
        "nombre" => "Paco",
        "apellidos" => "León",
        "lugar" => "Sevilla, Andalucía",
        "pais" => "ES",
        "imdb" => "1346713",
        "fechaNacimiento" => "04/10/1974",
        "foto" => "PLeon"
    ),
    array(
        "nombre" => "François",
        "apellidos" => "Cluzet",
        "lugar" => "Paris",
        "pais" => "FR",
        "imdb" => "0167388",
        "fechaNacimiento" => "21/09/1975",
        "foto" => "FCluzet"
    ),
    array(
        "nombre" => "Monica",
        "apellidos" => "Belluci",
        "lugar" => "Città di Castello",
        "pais" => "IT",
        "imdb" => "0000899",
        "fechaNacimiento" => "30/09/1964",
        "foto" => "MBelluci"
    ),
    array(
        "nombre" => "Omar",
        "apellidos" => "Sy",
        "lugar" => "Trappes, Yvelines",
        "pais" => "FR",
        "imdb" => "1082477",
        "fechaNacimiento" => "20/01/1978",
        "foto" => "Osy"
    ),
    array(
        "nombre" => "Javier",
        "apellidos" => "Cámara",
        "lugar" => "Albelda de Iregua, La Rioja",
        "pais" => "ES",
        "imdb" => "0194572",
        "fechaNacimiento" => "19/01/1967",
        "foto" => "JCamara"
    ),
    array(
        "nombre" => "José",
        "apellidos" => "Mota",
        "lugar" => "Montiel, Ciudad Real",
        "pais" => "ES",
        "imdb" => "1239566",
        "fechaNacimiento" => "30/06/1965",
        "foto" => "JMota"
    ),
    array(
        "nombre" => "Santiago",
        "apellidos" => "Segura",
        "lugar" => "Madrid",
        "pais" => "ES",
        "imdb" => "0782213",
        "fechaNacimiento" => "07/05/1975",
        "foto" => "SSegura"
    )
    );//Array con los datos de los personajes

if (isset($_POST["inicializar"])){//Botón usado para reinicializar la sesión (imagen del HEADER)
    session_destroy();
}

if (!isset($_SESSION["personajes"])){//Control para que las variables se inicialicen una vez por sesión y no más veces.
    $_SESSION["personajes"] = $personajes;
    $_SESSION["contNombre"] = 0;
    $_SESSION["contApellido"] = 0;
    $_SESSION["contLugar"] = 0;
    $_SESSION["contFecNac"] = 0;
}

if (isset($_POST["editar"])){//Redirecciona a la vista de personaje para editarlo.
    $_SESSION["personaje"] = $_POST["editar"];
    header("Location: editPersonaje.php");
}

if (!isset($_SESSION["paises"])){//Agrega a la sesión el array paises (banderas)
    $_SESSION["paises"] = $paises;
}

if (isset ($_POST["borrar"])){//Borra un personaje
    unset($_SESSION["personajes"][$_POST["borrar"]]);
}


if (isset($_POST["nombre"])){//Ordena el array por el nombre, si se vuelve a pulsar, lo ordena de forma inversa
    $_SESSION["contNombre"]++;//Aumenta el contador
    $_SESSION["contApellido"] = 0;// Resetea el contador de los otros botones de ordenación
    $_SESSION["contLugar"] = 0;
    $_SESSION["contFecNac"] = 0;
    if ($_SESSION["contNombre"] == 2){//Ordena descentemente si ya se ha clickeado
        usort($_SESSION["personajes"], function ($b, $a){//ordena mediante función de comparación
            return strcmp($a["nombre"], $b["nombre"]);
        });
        $_SESSION["contNombre"] = 0;//Si se ha clickeado una vez entra y lo resetea para la siguiente
    }else{
        usort($_SESSION["personajes"], function ($a, $b){
            return strcmp($a["nombre"], $b["nombre"]);
        });
    }
}

if (isset($_POST["apellidos"])){//Ordena el array por los apellidos, si se vuelve a pulsar, lo ordena de forma inversa
    $_SESSION["contApellido"]++;//Aumenta el contador
    $_SESSION["contNombre"] = 0;// Resetea el contador de los otros botones de ordenación
    $_SESSION["contLugar"] = 0;
    $_SESSION["contFecNac"] = 0;
    if ($_SESSION["contApellido"] == 2){//Si se ha clickeado una vez entra y lo resetea para la siguiente
        usort($_SESSION["personajes"], function ($b, $a){
            return strcmp($a["apellidos"], $b["apellidos"]);
        });
        $_SESSION["contApellido"] = 0;
    }else{
        usort($_SESSION["personajes"], function ($a, $b){
            return strcmp($a["apellidos"], $b["apellidos"]);
        });
    }
}

if (isset($_POST["lugar"])){//Ordena el array por el pais, si se vuelve a pulsar, lo ordena de forma inversa
    $_SESSION["contLugar"]++;//Aumenta el contador
    $_SESSION["contNombre"] = 0;// Resetea el contador de los otros botones de ordenación
    $_SESSION["contApellido"] = 0;
    $_SESSION["contFecNac"] = 0;
    if ($_SESSION["contLugar"] == 2){//Si se ha clickeado una vez entra y lo resetea para la siguiente
        usort($_SESSION["personajes"], function ($b, $a){
            return strcmp($a["pais"], $b["pais"]);
        });
        $_SESSION["contLugar"] = 0;
    }else{
        usort($_SESSION["personajes"], function ($a, $b){
            return strcmp($a["pais"], $b["pais"]);
        });
    }
}

if (isset($_POST["fecNac"])){//Ordena el array por el pais, si se vuelve a pulsar, lo ordena de forma inversa
    $_SESSION["contFecNac"]++;//Aumenta el contador
    $_SESSION["contNombre"] = 0;// Resetea el contador de los otros botones de ordenación
    $_SESSION["contApellido"] = 0;
    $_SESSION["contLugar"] = 0;
    array_walk ( $_SESSION["personajes"], function (&$key){//Aplica la función a cada valor del array
        $delim = "/";//Delimitador
        $key["fechaNacimiento"] = str_replace($delim, "-", $key["fechaNacimiento"]);
    });

    if ($_SESSION["contFecNac"] == 2){//Si se ha clickeado una vez entra y lo resetea para la siguiente
        usort($_SESSION["personajes"], "comparaFecha");
        $_SESSION["contFecNac"] = 0;
    }else{
        usort($_SESSION["personajes"], "comparaFechaInvertido");
    }

    array_walk ( $_SESSION["personajes"], function (&$key){
        $delim = "-";
        $key["fechaNacimiento"] = str_replace($delim, "/", $key["fechaNacimiento"]);
    });
}

function comparaFecha($a, $b) {//Función ordenación fechas ascendente
    if (strtotime($a["fechaNacimiento"]) < strtotime($b["fechaNacimiento"])){
        return 1;
    }elseif (strtotime($a["fechaNacimiento"]) > strtotime($b["fechaNacimiento"])){
        return -1;
    }else{
        return 0;
    }
}
function comparaFechaInvertido($a, $b) {//Función ordenación fechas descendente
    if (strtotime($a["fechaNacimiento"]) > strtotime($b["fechaNacimiento"])){
        return 1;
    }elseif (strtotime($a["fechaNacimiento"]) < strtotime($b["fechaNacimiento"])){
        return -1;
    }else{
        return 0;
    }
}

