<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="transaction",
 *     description="transaction model",
 *     @OA\Xml(
 *         name="transaction"
 *     )
 * )
 */
class Transaction
{

    /**
     * @OA\Property(
     *     title="User ID",
     *     description="User ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $user_id;


    /**
     * @OA\Property(
     *     title="value",
     *     description="value of transaction",
     *     format="int64",
     *     example=1000
     * )
     *
     * @var integer
     */
    private $value;


    /**
     * @OA\Property(
     *     title="type",
     *     description="type of transaction",
     *     format="int32",
     *     example=1
     * )
     *
     * @var integer
     */
    private $type;


    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new transaction",
     *      example="Пополнение  на сумму 1000 рублей"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

}
