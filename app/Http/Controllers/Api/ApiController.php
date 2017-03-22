<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * Class ApiController
 *
 * @package App\Http\Controllers\Api
 *
 * @SWG\Swagger(
 *     basePath="/api",
 *     host="localhost:8000",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="1.0",
 *         title="Base API",
 *         @SWG\Contact(name="Laravel Team", url=""),
 *     )
 * )
 */
class ApiController extends Controller {
    protected $currentUser = null;
    protected $userRepository;

    public function __construct(Request $request, ApiResponse $response, UserRepository $userRepository)
    {
        $this->request = $request;
        $this->response = $response;
        $this->userRepository = $userRepository;
        $token = $this->request->get('auth_token');
        if(!empty($token)) {
            $this->currentUser = $userRepository->findBy('auth_token', $token);
        }
    }

}
