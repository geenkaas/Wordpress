<?php
define('DB_NAME', 'dbcustomer');
define('DB_USER', 'customerdbadmin');
define('DB_PASSWORD', 'replace');

define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'Es&nN$JDo~AIO%*Y{TT&vFe-b?[$Ti[^rz`-A|`^_0E7Luc;*q>YB*q[,,PR+eHf');
define('SECURE_AUTH_KEY',  '$g%PCl.|q<>|4D5=e5({EZ./IN,a_yHUZOJ=#w,nLwTq-4(VEQ.H#.Pzra2Dk#(v');
define('LOGGED_IN_KEY',    '#Ht/%}|`OJ |&I-Qkm-m(E2vS{xh[yJtggRdv+t5vuWY|[07BLoUO7z2]mBU&Eiv');
define('NONCE_KEY',        'kkJ:g8Q),A+5a$nGK&jg2[k3}%5zC-LK6KM+#)-Xrj7cA(o@JHt+f}Mi1cCR9z+?');
define('AUTH_SALT',        '$zDka;(D1s>&>WmSBLdc3rUUlmBu9pI;,Guf;,+$3->]agXqh+W{+XOw+YPHKR4y');
define('SECURE_AUTH_SALT', 'vzV-`P w.k)ZY8bvoDs2y[+-v$5(XtL)N*8o.1%Y^HuB0d^vq]]&H#KH3V V#-_9');
define('LOGGED_IN_SALT',   '&=,@%{9D3YVp#+X@elx2pZ*cvy#G>( oa(]1``#flQg?JQ<ukeP~7gJa4b0 <1EP');
define('NONCE_SALT',       '{|UN;?7(O#%,Z@/JiVR+I,-&W/O=SE8i$+V/B73PWHm[,r,CRW};i>ts,jJh/Ve8');

$table_prefix  = 'replace_';
define('WPLANG', '');
define('WP_DEBUG', false);

if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
