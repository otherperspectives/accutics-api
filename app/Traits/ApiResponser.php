<?php

namespace  App\Traits;

use Illuminate\Http\Response;

// This trait normalizes the responses sent by the microservice
// so we have consistent response messages formats
trait ApiResponser {

    /** Build success responses
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function successResponse($data, $code = Response::HTTP_OK){
        return \response($data, $code)->header('Content-Type', 'application/json');
    }

    /** Build error responses
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code) {
        return \response()->json(['error' => $message, 'code' => $code], $code)->header('Content-Type', 'application/json');
    }

    /** Build error responses
     * @param $message
     * @param $code
     * @return \Illuminate\Http\Response
     */
    public function errorMessage($message, $code) {
        return \response($message, $code)->header('Content-Type', 'application/json');
    }
}
