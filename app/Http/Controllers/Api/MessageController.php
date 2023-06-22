<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class MessageController extends Controller
{
    use ApiResponser;
    /**
     * @OA\Post(
     *   tags={"Message"},
     *   path="/message/store",
     *   summary="store message user",
     *   @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="mobile",
     *                     description="the mobile",
     *                     type="string",
     *                 ),
     *  @OA\Property(
     *                     property="fullname",
     *                     description="the fullname",
     *                     type="string",
     *                 ),
     *  @OA\Property(
     *                     property="message",
     *                     description="message",
     *                     type="string",
     *                 )
     *             )
     *         )
     *     ),
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
     *      @OA\JsonContent()
     *   )
     * )
     */
    public function store(Request $request){

        $request->validate([
            'fullname' => 'required|string',
            'mobile' => 'required|string',
            'message' => 'required|string',
        ]);

        return $this->success(NULL, 'باموفقیت ثبت شد');
    }
}
