<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
class APIBaseController extends Controller
{
	public function sendResponse($result, $message)
	{
		$response = [
			'status' => true,
			'data' => $result,
			'msg' => $message,
		];
		return response()->json($response, 200);
	}

	public function sendError($error, $errorMessages = [], $code = 404)
	{
		$response = [
			'status' => false,
			'msg' => $error,
		];
		if(!empty($errorMessages)){
			$response['data'] = $errorMessages;
		}
		return response()->json($response, $code);
	}
}