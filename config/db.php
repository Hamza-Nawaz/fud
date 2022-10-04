<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=lin-2988-3008-mysql-primary.servers.linodedb.net;dbname=data_center',
    'username' => 'linroot',
    'password' => 'djHY0vMHd3dNs-GY',
    'charset' => 'utf8',
    'attributes' => array(
        PDO::MYSQL_ATTR_SSL_CA => 'logs_data-ca-certificate.crt',
    ),

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
