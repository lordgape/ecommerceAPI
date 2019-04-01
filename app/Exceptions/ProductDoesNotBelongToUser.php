<?php

namespace App\Exceptions;

use Exception;

class ProductDoesNotBelongToUser extends Exception
{
    public function render()
    {
        return ["errors" => [

                "error" => PRODUCT_DOES_NOT_BELONG_TO_USER_ERROR_CODE,
                "messages" => "Product does not belong to user"

                ]
        ] ;
    }
}
