<?php
class AuthController extends BaseController
{
	protected function validator(array $data)
	{
		return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
		]);
	}

	protected function loginValidator(array $data)
	{
		return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:6',
		]);
	}
	
	
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'download_count' => 3
		]);
	}
	public function loginUsername()
	{
		return property_exists($this, 'username') ? $this->username : 'email';
	}
	protected function getCredentials(Request $request)
	{
		return $request->only($this->loginUsername(), 'password');
	}
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : 'login';
	}
	protected function postRegister()
	{
		$status = true;
		$validator = $this->validator(Input::all());

		if ($validator->fails()) {
			$status = false;
			return Response::json(array("status" => $status, "errors" => $validator->messages()->toArray()));
			/*return Redirect::to("signup")
		->withErrors($validator->messages());*/
		}

		$this->create(Input::all());
		return Response::json(array("status" => $status));
		/*return Redirect::to("/");*/
	}
	protected function postLogin()
	{
		$status = false;
		$validator = $this->loginValidator(Input::all());
		$credentials = Input::all();

		if (\Auth::attempt($credentials)) {
			Session::put('user', Auth::user());
			$status = true;
			//return Redirect::intended('home');
		}
		
		return Response::json(array("status" => $status));
		
		/*return Redirect::to("login")
		->withErrors($validator->messages());*/
		/*->withInput($request->only($this->loginUsername(), 'remember'))
		->withErrors([
		$this->loginUsername() => $this->getFailedLoginMessage(),
		]);*/
	}
}
