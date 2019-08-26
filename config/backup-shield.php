<?php

    return [
        'password' => env('ZIP_PASS'),
        'encryption' => \Olssonm\BackupShield\Encryption::ENCRYPTION_DEFAULT

        // Available encryption methods:
        // \Olssonm\BackupShield\Encryption::ENCRYPTION_DEFAULT (PKWARE/ZipCrypto)
        // \Olssonm\BackupShield\Encryption::ENCRYPTION_WINZIP_AES_128 (AES 128)
        // \Olssonm\BackupShield\Encryption::ENCRYPTION_WINZIP_AES_192 (AES 192)
        // \Olssonm\BackupShield\Encryption::ENCRYPTION_WINZIP_AES_256 (AES 256)
    ];
