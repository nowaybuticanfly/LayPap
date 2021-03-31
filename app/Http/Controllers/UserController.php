<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends BaseController
{
    /**
     * @OA\Get(
     *      path="/api/users",
     *      operationId="getUsersList",
     *      tags={"Users"},
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
     *       )
     * )
     */
    public function index() {
        $users = User::with('profile:user_id,balance')->get()->map(function ($user) {
            $user->balance = $user->profile->balance;
            unset($user->profile);
            return $user;
        });

        return response()->json($users, 200);
    }

    /**
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *      path="/api/users/{id}/balance",
     *      operationId="showBalance",
     *      tags={"Users"},
     *      summary="Get user's balance",
     *      description="Returns user's balance",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent(ref="#/components/schemas/UserBalance")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid user id"
     *      )
     * )
     */

    public function showBalance(int $id)
    {
        try {
            $balance = Profile::where(['user_id' => $id])->firstOrFail()->balance;

        } catch (ModelNotFoundException $e) {
            return response()->json('Invalid user id', 400);
        }

        return response()->json(['balance' => $balance], 200);

    }
}
