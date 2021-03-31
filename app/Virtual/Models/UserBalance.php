<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="userBalance",
 *     description="user balance",
 *     @OA\Xml(
 *         name="user balance"
 *     )
 * )
 */
class UserBalance
{
    /**
     * @OA\Property(
     *      title="balance",
     *      description="balance of the requested user",
     *      example="222"
     * )
     *
     * @var string
     */
    public $balance;
}
