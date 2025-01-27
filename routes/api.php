<?php


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('login', function (Request $request) {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         $user = Auth::user();
//         $token = $user->createToken('MyApp')->plainTextToken;
//         return response()->json(['token' => $token]);
//     }

//     return response()->json(['message' => 'Unauthorized'], 401);
// });

// // Route::get('login', function () {
// //     return response()->json(['message' => 'Login route working']);
// // });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     \Log::info('User route accessed');
//     \Log::info('Authenticated User: ', $request->user());

//     return $request->user();
// });

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});
