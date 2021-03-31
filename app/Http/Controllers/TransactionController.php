<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Transaction;
use Illuminate\Http\Request;



/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     *
     * @OA\Post(
     *      path="/api/transactions",
     *      operationId="storeTranaction",
     *      tags={"Transactions"},
     *      summary="Store new Transaction",
     *      description="Returns Transaction data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreTransactionRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Transaction")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     */

    public function store(Request $request) {
        try {
            return response()->json(Transaction::create($this->validateCreate($request)), 201);
        } catch (\Exception $e) {
            return response()->json('Bad request', 400);
        }
    }

    /**
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Put(
     *      path="/api/transactions/{id}",
     *      operationId="refundTransaction",
     *      tags={"Transactions"},
     *      summary="Refund existing transaction",
     *      description="Returns refunded transaction data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Transaction")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid transaction id"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Already refunded"
     *      )
     * )
     */
    public function update(int $id) {

        try {
            $transaction = Transaction::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            return response()->json('Invalid transaction id', 400);
        }


        if($transaction->refunded()) {
           return response()->json('Already refunded', 422);
        }


        $transaction->refund();

        return response()->json($transaction, 202);
    }


    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateCreate(Request $request): array
    {
        return $this->validate($request, [
            'user_id' => 'required|exists:App\Models\User,id',
            'value' => 'required|numeric',
        ]);
    }
}
