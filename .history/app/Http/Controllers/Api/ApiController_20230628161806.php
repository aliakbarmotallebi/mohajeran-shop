<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Swagger(
 *     schemes={"http","https"},
 *     produces={"application/json"},
 * 	   consumes={"application/json"},
 *     host=L5_SWAGGER_CONST_HOST,
 *     @OA\Info(
 *         version="1.0.0",
 *         title="API for e-commerce ",
 *         description="",
 *     ),
 *     @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="Authorization",
 *      type="http",
 *      scheme="Bearer",
 *      bearerFormat="JWT",
 *   )
 * ),
 * @OA\Server(url="http://localhost:8180/api"),
 * @OA\Server(url="http://localhost:8000/api", description="localhost")
 * @OA\Server(url="https://shopjozi.ir/api"),
 */
class ApiController extends Controller
{
    //
}
