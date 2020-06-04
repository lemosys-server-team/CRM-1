<?php
/**
 * @see https://github.com/Edujugon/PushNotification
 */

return [
    'gcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'My_ApiKey',
    ],
    'fcm' => [
        'priority' => 'high',
        'dry_run' => false,
        'apiKey' => 'AIzaSyBekzJ4kk6R16fypuhzKMv9oa_q9QYOutM',
    ],
    'apn' => [
        'certificate' => __DIR__ . '/iosCertificates/Aajnodin_distribution.pem',
        'passPhrase' => 'aajnodin', //Optional        
        'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
        'dry_run' => false,
    ],
];
