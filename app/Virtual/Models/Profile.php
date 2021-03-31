<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="profile",
 *     description="profile model",
 *     @OA\Xml(
 *         name="profile"
 *     )
 * )
 */
class Profile
{

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

    /**
     * @OA\Property(
     *     title="Balance",
     *     description="Balance",
     *     format="int64",
     *     example=111
     * )
     *
     * @var float
     */
    private $balance;


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
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *      title="user ID",
     *      description="User id of the new profile",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;


    /**
     * @OA\Property(
     *     title="User",
     *     description="profile's user model"
     * )
     *
     * @var \App\Virtual\Models\User
     */
    private $user;
}
