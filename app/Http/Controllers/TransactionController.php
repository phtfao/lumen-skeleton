<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phtfao\Panako\Core\Transaction\TransactionService;
use Phtfao\Panako\Support\Exceptions\BusinessException;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class TransactionController extends Controller
{
    public function __construct(
        private TransactionService $service
    ) {}

    /**
     * @OA\Post(
     *      path="/transfer",
     *      summary="Transferência de valores",
     *      description="Envia valores de uma conta a outra",
     *      operationId="transfer",
     *      tags={"transaction"},
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Parâmetros necessários para realizar uma transferência",
     *          @OA\JsonContent(
     *              required={"payer_id","payee_id", "value"},
     *              @OA\Property(
     *                  property="payer_id",
     *                  type="integer",
     *                  format="999",
     *                  example="123",
     *                  description="Identificado do usuário que está fazendo a transferência."
     *              ),
     *              @OA\Property(
     *                  property="payee_id",
     *                  type="integer",
     *                  format="999",
     *                  example="456",
     *                  description="Identificado do usuário que está recebendo a transferência."
     *              ),
     *              @OA\Property(
     *                  property="value",
     *                  type="number",
     *                  format="999.99",
     *                  example="123.45",
     *                  description="Valor a ser transferido."
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Success",
     *      )
     *  )
     */
    public function transfer(Request $request)
    {
        $arrResponse = [];
        try {
            $this->service->transfer(
                $request->input('payer_id') ?? 0,
                $request->input('payee_id') ?? 0,
                $request->input('value') ?? 0
            );
            $arrResponse = response()->json([
                'status' => 'success',
                'message' => 'Transferência realizada com sucesso.'
            ], 201);
        } catch (BusinessException $be) {
            $arrResponse = response()->json([
                'status' => 'error',
                'message' => $be->getMessage()
            ], $be->getCode());
        } catch (\Exception | \Throwable $e) {
            $arrResponse = response()->json([
                'status' => 'error',
                'message' => 'Erro ao realizar transferência.'
                . $e->getMessage()
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $arrResponse;
    }    
}