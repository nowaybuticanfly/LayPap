<?php

namespace App\Virtual\Resources;


/**
 * @OA\Schema(
 *     title="UsersResource",
 *     description="Users resource",
 *     @OA\Xml(
 *         name="UsersResource"
 *     )
 * )
 */
class UserResource
{
    /**
     * @OA\Property(
     *     title="User1",
     *     description="User1Data"
     * )
     *
     * array @QA\Items(
     *     @var \App\Virtual\Models\User
     *     )
     */
}
