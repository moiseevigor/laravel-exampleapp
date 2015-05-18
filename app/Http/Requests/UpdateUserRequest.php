<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
	        'role_id' => 'required',
	        'name' => 'required',
	        'password' => 'required|min:6',
	        'email' => 'required|email|unique:users,email,' . Request::get('userId')
		];
	}

}