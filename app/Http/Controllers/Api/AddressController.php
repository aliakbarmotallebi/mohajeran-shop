<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;


class AddressController extends Controller
{
    use ApiResponser;
    /**
     * @OA\Get(
     *     path="/addresses",
     *     tags={"Address"},
     *     summary="List all addresses is user logged in",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        $user = $request->user();
          return $this->success(
                 $user->addresses);
    }


    /**
     * @OA\Patch(
     *     path="/addresses",
     *     tags={"Address"},
     *     summary="update address is user logged in",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *  @OA\Property(
     *      property="addresses",
     *      type="array",
     *      @OA\Items(),
     *      description="bla bla bla"
     * )
     *             )
     *         )
     *     ),
     *  security={{"bearerAuth":{}}},
     *  @OA\Response(response=204, description="address updated successfully", @OA\JsonContent()),
     *  @OA\Response(response=404, description="address not found", @OA\JsonContent())
     * )
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'addresses' => 'required|array',
        ]);

        $user = $request->user();
        $user->addresses = $request->get('addresses');

        if($user->save()){
              return $this->success(
                 'باموفقیت آدرس شما ویرایش شد');
        }

        return response()->noContent();
    }

   
}
