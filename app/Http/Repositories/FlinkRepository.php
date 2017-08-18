<?php
 namespace App\Http\Repositories;

 use App\Http\Models\Flink;

 class FlinkRepository
 {
     protected $flink;

     public function __construct(Flink $flink)
     {
         $this->flink = $flink;
     }

     public function getFlinkModel()
     {
         return $this->flink;
     }
 }