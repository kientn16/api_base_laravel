<?php namespace App\Http\Middleware;

use Closure;

use App\Http\Controllers\Api\ApiResponse;
use App\Repositories\Interfaces\UserRepository;

class ApiAuthenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    protected $repository;

    /**
     * Create a new filter instance.
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(ApiResponse $response, UserRepository $userRepository)
    {
        $this->response = $response;
        $this->repository = $userRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $params = $request->all();

        if (empty($params['auth_token'])) {
            return $this->response->errorWrongArgs('Token is not provided.');
        }
        $token = $params['auth_token'];

        $auth = $this->repository->findBy('auth_token', $token);

        if (!$auth) {
            return $this->response->errorNotFound('Token is invalid.');
        }

        return $next($request);
    }
}
