<?php

namespace BigCommerceIntegrations\Categories\Services;

use BigCommerceIntegrations\Categories\Interfaces\ExportInterface;

class JsonExportService implements ExportInterface {

    protected $filePath;

    protected $data;

    public function __construct(){
        $this->filePath = base_path()."\\files";
    }

    public function setData($data){
        $this->data = json_encode($data, JSON_PRETTY_PRINT);
        return $this;
    }

    public function export(){
        file_put_contents( $this->filePath ."/". ExportInterface::FILENAME ."_". date("m-d-Y").".json" , $this->data);
    }

}
