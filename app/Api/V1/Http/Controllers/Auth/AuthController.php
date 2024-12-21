<?php

namespace App\Api\V1\Http\Controllers\Auth;
;
use App\Api\V1\Http\Requests\Auth\LoginRequest;
use App\Api\V1\Http\Requests\Auth\RegisterRequest;
use App\Api\V1\Http\Resources\Auth\AuthResource;
use App\Api\V1\Http\Resources\Auth\LoginResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForgotPasswordRequest;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * @group Xác thực
 */

class AuthController extends Controller
{
    /**
     * Đăng nhập
     *
     * @bodyParam email string required Email đăng nhập. Example:admin@gmail.com
     * @bodyParam password string required Mật khẩu đăng nhập. Example:password
     *
     * @param LoginRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'status' => 401,
                'error' => 'Thông tin đăng nhập không chính xác',
            ], );
        }

        $user = auth()->guard('api')->user();
        $cookie = $this->setAccessTokenAndRefreshToken($token);

        $accessTokenCookie = $cookie['tokenCookie'];

        return $this->respondWithToken($token, $user)->withCookie($accessTokenCookie);
    }

    /**
     * Đăng ký tài khoản
     *
     * @bodyParam email string required Email đăng nhập. Example:
     * @bodyParam password string required Mật khẩu đăng nhập. Example:
     * @bodyParam password_confirmation string required Nhập lại mật khẩu. Example:
     * @bodyParam name string required Tên. Example:
     *
     * @param RegisterRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);

            $token = auth()->guard('api')->login($user);
            $cookie = $this->setAccessTokenAndRefreshToken($token);
            $accessTokenCookie = $cookie['tokenCookie'];

            return $this->respondWithToken($token, $user)->withCookie($accessTokenCookie);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Đăng ký không thành công',
            ], 401);
        }
    }

    /**
     * Thông tin cá nhân
     *
     * @authenticated
     *
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function me()
    {
        try {
            auth()->guard('api')->login(auth()->guard('api')->user());

            return response()->json([
                'user' => new AuthResource(auth()->guard('api')->user()),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Token không hợp lệ',
            ], 401);
        }
    }

    /**
     * Đăng xuất
     *
     * @authenticated
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->guard('api')->logout();

        $cookie = Cookie::forget('access_token');

        return response()->json(['message' => 'Đăng xuất thành công'])->withCookie($cookie);
    }


    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'user' => new LoginResource($user),
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    private function setAccessTokenAndRefreshToken($token)
    {
        $cookie = Cookie::make(
            'access_token',
            $token,
            52560000,
            "/",
            null,
            true,
            true,
            false,
            "None"
        );

        return [
            'tokenCookie' => $cookie,
        ];
    }

    /**
     * Quên mật khẩu
     *
     * @bodyParam email string required Email đăng nhập. Example:admin@gmail.com
     * @bodyParam device string required Thiết bị. Example:web
     * @bodyParam time string required Thời gian. Example:2021-09-01 12:00:00
     *
     * @param \App\Http\Requests\Admin\ForgotPasswordRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function sendLinkResetPassword(ForgotPasswordRequest $request)
    {
        //
    }

    /**
     * Đổi mật khẩu
     *
     * @bodyParam email string required Email đăng nhập. Example:admin@gmail.com
     * @bodyParam token string required Token. Example:dmaisndasdsjdsjadnjsand
     * @bodyParam password string required Mật khẩu mới. Example:123456
     * @bodyParam password_confirmation string required Nhập lại mật khẩu mới. Example:123456
     *
     * @param \App\Http\Requests\Admin\ResetPasswordRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        $admin = Admin::where('email', $data['email'])->first();

        if ($admin->remember_token != $data['token']) {
            return response()->json(['error' => 'Token không hợp lệ'], 401);
        }

        $admin->password = bcrypt($data['password']);
        $admin->remember_token = null;
        $admin->save();

        return response()->json(['message' => 'Đổi mật khẩu thành công']);
    }
}