<?php

Class upload 
{
    const uploadDir = '/var/www/html/merger/uploads/';

    public function __construct()
    {
        echo "<code>";
        print_r( $_FILES );
        echo "</code>";

        foreach( $_FILES["pdfs"][error] as $key => $error ){
            if ( $error === UPLOAD_ERR_OK) {
            
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
            
                if( $mime !== 'application/pdf'){
                    die( 'Tipo de archivo inválido, solo se aceptan ficheros PDF' ); 
                }
                $tmpFile =  $_FILES["pictures"]["tmp_name"][$key];
                move_uploaded_file( $tmpFile, self::uploadDir . 'file' . $key . '.pdf' );
            }else{
                die("Upload failed with error key: " . $key . " error: " .  $error);
            }
        }
    }
}

$upload = new upload(); 
