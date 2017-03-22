<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Http\Request;
use Validator;

class UserController extends ApiController {

    public function __construct(UserRepository $userRepository, Request $request, ApiResponse $response)
    {
        parent::__construct($request, $response, $userRepository);
    }

    /**
     * Register user
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Post(
     *     path="/user",
     *     description="Register User",
     *     produces={"application/json"},
     *     tags={"User"},
     *     @SWG\Parameter(
     *       name="name",
     *       in="formData",
     *       description="",
     *       required=true,
     *       type="string",
     *     ),
     *     @SWG\Parameter(
     *       name="email",
     *       in="formData",
     *       description="",
     *       required=true,
     *       type="string",
     *     ),
     *     @SWG\Parameter(
     *       name="password",
     *       in="formData",
     *       description="",
     *       required=true,
     *       type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Success."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server.",
     *     )
     * )
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            return $this->response->errorWrongArgs($message);
        }

        $user = $this->userRepository->sign_up($request);

        if($user) {
            return $this->response->withMessage("", $user->preJson(false));
        } else {
            $message = trans('error.sign_up_fail');
            return $this->response->errorInternalError($message);
        }
    }

    /**
     * Login user
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Post(
     *     path="/user/login",
     *     description="Login",
     *     produces={"application/json"},
     *     tags={"User"},
     *     @SWG\Parameter(
     *       name="email",
     *       in="formData",
     *       description="",
     *       required=true,
     *       type="string",
     *     ),
     *     @SWG\Parameter(
     *       name="password",
     *       in="formData",
     *       description="",
     *       required=true,
     *       type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Success."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server.",
     *     )
     * )
     */
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            return $this->response->errorWrongArgs($message);
        }

        $user = $this->userRepository->login($request);

        if($user) {
            return $this->response->withMessage("", $user->preJson(false));
        } else {
            $message = trans('error.login_fail');
            return $this->response->errorInternalError($message);
        }
    }

    /**
     * Get user
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/user/{id}",
     *     description="Get User Profile",
     *     produces={"application/json"},
     *     tags={"User"},
     *     @SWG\Parameter(
     *       name="id",
     *       in="path",
     *       description="",
     *       required=true,
     *       type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Success."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server.",
     *     )
     * )
     */
    public function show($id) {
        $user = $this->userRepository->findBy('id', $id);
        if($user) {
            return $this->response->withMessage("", $user->preJson());
        } else {
            $message = trans('error.user_not_found');
            return $this->response->errorInternalError($message);
            #return $this->response->withMessage("", $this->currentUser);
        }
    }
}
