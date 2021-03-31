<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="user",
 *     description="user model",
 *     @OA\Xml(
 *         name="user"
 *     )
 * )
 */
class User
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new user",
     *      example="A nice user"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Email",
     *      description="Email of the new user",
     *      example="user@user.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="balance",
     *      description="balance of the user",
     *      example="222"
     * )
     *
     * @var string
     */
    public $balance;

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


}
