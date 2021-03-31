<?php

namespace App\Virtual\Requests;

/**
* @OA\Schema(
*      title="Store Transaction request",
*      description="Store Transaction request body data",
*      type="object",
*      required={"name"}
* )
*/

class StoreTransactionRequest
{

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="User's id of the new tranaction",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;

    /**
     * @OA\Property(
     *      title="value",
     *      description="Value of transaction",
     *      format="int64",
     *      example=1000
     * )
     *
     * @var integer
     */
    public $value;
}
