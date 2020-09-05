<?php
namespace App\Traits;

use App\FoodOrder;

trait Order
{
    public function getPaymentStatus($requestParams)
    {
      $updateStatus = FoodOrder::find($requestParams->id);
      $updateStatus->status = 1;
      $updateStatus->save();

      return;
    }
    
}
