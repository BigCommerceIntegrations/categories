<?php

namespace BigCommerceIntegrations\Categories\Services;

use BigCommerceIntegrations\Categories\Connectors\BCApi;
use BigCommerceIntegrations\Categories\Services\JsonExportService;
use Illuminate\Support\Facades\Log;

class BCCategoryService {

    private $bcAgent;

    private $jsonService;

    public function __construct(BCApi $bcAgent, JsonExportService $jsonService){
        $this->bcAgent = $bcAgent;
        $this->jsonService = $jsonService;
    }

    public function getData(){
        return $this->bcAgent->call( '/v3/catalog/categories', null, 'GET' );
    }

    public function exportAsJson(){
        try{
            $this->jsonService
            ->setData( $this->getData() )
            ->export();
        
        }catch(\Exception $e){
            Log::debug($e->getMessage());
        }catch(\Error $e){
            Log::debug($e->getMessage());
        }
    }

}
