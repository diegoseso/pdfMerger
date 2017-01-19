<?php
    
include 'vendor/autoload.php';

Class upload 
{

    /**
     *
     */
    const uploadDir = '/var/www/html/merger/uploads/';


    /**
     *
     */
    public $uploadedFiles;


    /**
     * 
     */
    public function __construct()
    {
        foreach( $_FILES["pdfs"]["error"] as $key => $error ){
            if ( $error !== UPLOAD_ERR_OK) {
                die("Existen errores al cargar el ficheero");
            }
        }
        
        foreach( $_FILES["pdfs"]["tmp_name"] as $key => $tmpFile ){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file( $finfo, $tmpFile );
            
            if( $mime !== 'application/pdf'){
                die( 'Tipo de archivo inválido, solo se aceptan ficheros PDF' ); 
            }
            move_uploaded_file( $tmpFile, self::uploadDir . 'file' . $key . '.pdf' );
            $this->uploadedFiles[] = self::uploadDir . 'file' . $key . '.pdf';
        }
    }
   
    /**
     *
     */
    public function merge()
    {
        $pdf = new \Jurosh\PDFMerge\PDFMerger;

        foreach( $this->uploadedFiles as $file ){
            $pdf->addPDF($file, 'all');
        }    
        
        $pdf->merge('browser', dirname( __FILE__ ) . 'merged.pdf');

    }
}

$uploads = new upload();
$uploads->merge();
