<?php
 namespace App\Http\Repositories;

 use App\Http\Models\Config;

 class ConfigRepository
 {
     protected $config;

     public function __construct(Config $config)
     {
         $this->config = $config;
     }

     public function getConfigModel()
     {
         return $this->config;
     }
 }