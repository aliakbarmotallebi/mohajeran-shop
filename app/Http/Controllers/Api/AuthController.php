<?php namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Traits\ApiResponser;
use App\Events\CustomerNewPushToService;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class AuthController extends Controller
{
    use ApiResponser;

        /**
     * @OA\Post(
     *   tags={"User"},
     *   path="/auth/login",
     *   summary="Login User",
     *   @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="mobile",
     *                     description="the mobile",
     *                     type="string",
     *                 )
     *             )
     *         )
     *     ),
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */
    public function login(UserRequest $request){

        $data = $request->validated();
        
        $user = User::whereMobile($data['mobile'])->firstOr(function () use($data){
            return User::create([
                'mobile'   => $data['mobile'],
                'password' => "shop123@",
                'code_expired_at' => Carbon::now()
            ]);
        });

        if($user instanceof User){

            if (  ! $user->canResendCode() ) {
                return $this->error(
                    'بعداز دو دقیقه مجددا تلاش کنید',
                    401);
            }

            $user->callToVerify();

            return $this->success(
                null,
                'کد احراز به شماره شما ارسال شد');
        }

        return $this->error(
            'خطا در ورود شما به سیستم با مدیریت تماس بگیرید',
            401);
    }

    /**
     * @OA\Post(
     *   tags={"User"},
     *   path="/auth/verify",
     *   summary="Verify of user by code sms",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *               @OA\Property(
     *                     property="mobile",
     *                     description="phone number",
     *                     type="string",
     *                 ),
     *              @OA\Property(
     *                     property="code",
     *                     description="code",
     *                     type="integer",
     *                 )
     *             )
     *         )
     *     ),
     *   @OA\Response(response=201, description="access all api", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid verify", @OA\JsonContent())
     * )
     */

    public function verify(UserRequest $request)
    {

        $user = User::whereMobile($request['mobile'])
            ->first();

        if ($user->verification_code != $request->code) {
            return $this->error(
                'کد شما معتبر نمی باشد',
                401);
        }

        if ( $user->isExpired() ) {
            return $this->error(
                'کد منقضی شد مجددا وارد شوید',
                401);
        }

        $data['mobile']   = $user->mobile;
        $data['password'] = "shop123@";

        try {
            if (!$token =  JWTAuth::attempt($data)) {
                return $this->error(
            'خطا در ورود شما به سیستم با مدیریت تماس بگیرید',
                    401);
            }
        } catch (JWTException $e) {
            return $this->error(
            'خطا در ورود شما به سیستم با مدیریت تماس بگیرید',
                500);
        }

        return $this->createNewToken($token);

    }


    /**
     * @OA\Post(
     *   tags={"User"},
     *   path="/auth/refresh/token",
     *   summary="Refresh user the token jwt",
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(response=200, description="Successful", @OA\JsonContent())
     * )
     */
    public function refresh(Request $request) {
        return $this->createNewToken(Auth::guard('api')->claims($request->user()->getJWTCustomClaims())->refresh());
    }

    /**
     * @OA\Post(
     *   tags={"User"},
     *   path="/auth/profile",
     *   summary="Display info user logined",
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(response=200, description="Successful", @OA\JsonContent())
     * )
     */
    public function userProfile() {
        return $this->success(
            Auth::user(),
            'User show profile');
    }

     /**
     * @OA\Post(
     *   tags={"User"},
     *   path="/auth/logout",
     *   summary="logout the user",
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(response=200, description="Successful", @OA\JsonContent())
     * )
     */
    public function logout() {

        auth('api')->logout();

        return $this->success(
            null,
            'باموفقیت از سیستم خارج شده اید');
    }

    protected function createNewToken($token){
        return $this->success(
            [
                'access_token' => $token,
                'token_type'   => 'bearer',
                // 'expires_in'   => auth('api')->factory()->getTTL() * 3600,
                'user'         => auth()->user()
            ],
            'User successfully created token');
    }


    /**
     * @OA\Post(
     *   tags={"User"},
     *   path="/auth/profile/edit",
     *   summary="Profile edit info user logined",
     *   @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="name",
     *                     description="name",
     *                     type="string",
     *                 ),
     *                  @OA\Property(
     *                     property="tel",
     *                     description="tel",
     *                     type="string",
     *                 )
     *              )
     *          )
     *      ),
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(response=200, description="Successful", @OA\JsonContent())
     * )
     */
    public function userProfileEdit(UserRequest $request) {

        $user = $request->user()->update($request->all());

        if( $user ){
            return $this->success(
                auth()->user(),
                'اطلاعات پروفایل شما بروز رسانی شد');
        }
        return $this->error(
            'خطا در ورود شما به سیستم با مدیریت تماس بگیرید',
            502);
    }

}
