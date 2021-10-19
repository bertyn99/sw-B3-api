<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @OA\SecurityScheme(
     * type="http",
     * description="Authentification Bearer Token",
     * name="Authentification Bearer Token",
     * in="header",
     * scheme="bearer",
     * bearerFormat="JWT",
     * securityScheme="apiAuth",
     * )
     */
    /**
   * @OA\Get(
   *      path="/AuthController",
   *      operationId="Authentification",
   *      tags={"Authentification"},

   *      summary="Create New AuthController ",
   *      description="Create new Authentification ",
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\MediaType(
   *           mediaType="application/json",
   *      )
   *      ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      ),
   * @OA\Response(
   *      response=400,
   *      description="Bad Request"
   *   ),
   * @OA\Response(
   *      response=404,
   *      description="not found"
   *   ),
   *  )
   */
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('jwt.verify', ['except' => ['login', 'register']]);
    }

    /**
     * 
     * @OA\Post(
     *     path="/login",
     *     tags={"Authentification"},
     *     operationId="addLogin",
     *     summary="Add a new login",
     *     description="",
     *     @OA\RequestBody(
     *         description="Get a Login",
     *         required=true,
     *          @OA\JsonContent(
     *          required={ "email", "password"},
     *    			@OA\Property(property="email",
     *                  type="string",
     *                  format="email"
     *         ),
     *          @OA\Property(property="password",
     *                  type="string",
     *                  format="password"
     *         ),
     *      ),
     *     ),
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     ),
     * )
     */
    
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }
 /**
     * @OA\Post(
     *     path="/register",
     *     tags={"Authentification"},
     *     operationId="addRegister",
     *     summary="Add a new register",
     *     description="",
     *      @OA\RequestBody(
     *         description="Get a name",
     *         required=true,
     *    			@OA\JsonContent(
     *          required={"name", "email", "password"},
     *    			@OA\Property(property="name",
     *                  type="string",
     *                  format="name"
     *         ),
     *          @OA\Property(property="email",
     *                  type="string",
     *                  format="email"
     *         ),
     *          @OA\Property(property="password",
     *                  type="string",
     *                  format="password"
     *         ),
     *      
     *    ),
     * ),
     *     @OA\RequestBody(
     *         description="Get a email",
     *         required=true,
     *    			@OA\Schema(
     *    				 @OA\Property(property="email",
     *    					type="string",
     *    					description="email"
     *    				),
     *         ),
     *     ),
     *     @OA\RequestBody(
     *         description="Get a password",
     *         required=true,
     *    			@OA\Schema(
     *    				 @OA\Property(property="password",
     *    					type="string",
     *    					description="password"
     *    				),
     *      ),
     *     ),
     * 
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input",
     *     ),
     * )
     */

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

}
