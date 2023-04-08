<?php

// Download the installer
$installer = file_get_contents('https://getcomposer.org/installer');

// Save the installer to a file
file_put_contents('composer-setup.php', $installer);

// Verify the installerr
$expectedHash = '795f976fe0ebd8b75f26a9824e4f82b06478557a937f82baf128f0c643fac3838a9f40bea7310a280bda020f81782a82';
$actualHash = hash_file('sha384', 'composer-setup.php');

if ($actualHash !== $expectedHash) {
    echo 'Composer installer corrupt' . PHP_EOL;
    exit(1);
}

// Install Composer
exec('php composer-setup.php --quiet --install-dir=bin --filename=composer');

// Remove the installer
unlink('composer-setup.php');

echo 'Composer installed successfully' . PHP_EOL;