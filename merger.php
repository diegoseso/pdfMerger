<?php

ini_set('opcache.enable', '0');
include 'vendor/autoload.php';

$pdf = new \Jurosh\PDFMerge\PDFMerger;

$pdf->addPDF('/var/www/html/merger/file1.pdf', 'all')
  ->addPDF('/var/www/html/merger/file2.pdf', 'all');

$pdf->merge('file', '/var/www/html/merger/merged.pdf');
