<?php defined('SYSPATH') or die('No direct script access.');

/**
 *
 */
class Controller_Account extends Controller_Layout
{
    public  $template="layout/account";
    protected  $title = "ToDo";

    public function before()
    {
        parent::before();

        if(Auth::instance()->logged_in())
        {
            if(Auth::instance()->logged_in("admin"))
            {
                HTTP::redirect("user_admin");
            }
            HTTP::redirect("note");
        }
    }

    public function action_index()
	{
        $post = $this->request->post();
        $remember_me = isset($post['remember']) ? TRUE : FALSE;
        if(isset($post["username"], $post["password"]))
        {
            if (Auth::instance()->login($post['username'], $post['password'], $remember_me))
            {
                if(Auth::instance()->get_user()->isActive)
                {
                    HTTP::redirect();
                }
                else
                {
                    Auth::instance()->logout();
                }
            }
            else
            {
                $this->template->messages["error"] = array("Login" => "Login data are incorrect.");
            }
        }
	}

    public function action_registration()
    {
        $user = $this->_registerUser(ORM::factory("user"));
        if($user->loaded())
        {
            try
            {
                $mailer = Kohana_Sender::connect();

                $token = ORM::factory('user_token');
                // Set token data
                $token->user_id = $user->id;
                $token->expires = time() + 100000;
                $token->save();

                $message = Swift_Message::newInstance()
                    ->setSubject('Forgotten Password - ToDo')
                    ->setFrom(array('kamilsmtptest@gmail.com' => 'ToDo'))
                    ->setTo(array($user->email => $user->username))
                //todo: add dynamic content to mailBody
                    ->setBody('Register User http://todo.localhost/account/confirm/' . $token->token, 'text/html');

                $mailer->send($message);

                $this->template->messages["success"] = array("Registration " => "Email has been sent");
            }
            catch (Exception $e)
            {
                $this->template->messages["error"] = array("Registration" => "Can't sent email. Contact Admin");
            }
        }
    }

    public function action_confirm()
    {
        $tokenId = $this->request->param("id");
        $token = Model_User_Token::factory('user_token')->where("token","=", $tokenId)->find();
        if($token->loaded())
        {
            if($this->_activateUser(ORM::factory("user", $token->user_id)))
            {
                $token->delete();
                $this->template->messages["success"] = array("Activate User" => "User account is Active");
            }
            else
            {
                $this->template->messages["error"] = array("Activate User" => "Can't activate user account");
            }
        }
        else
        {
            $this->template->messages["error"] = array("Activate User" => "Can't activate user. Token not exists or has expired");
        }
    }

    public function action_forgottenPassword()
    {
        $post= $this->request->post();
        if(isset($post["email"]))
        {
            $user = ORM::factory("user")->where("email","LIKE",$post["email"])->find();
            if($user->loaded())
            {
                try
                {
                    $mailer = Kohana_Sender::connect();

                    $token = ORM::factory('user_token');
                    // Set token data
                    $token->user_id = $user->id;
                    $token->expires = time() + 100000;
                    $token->save();

                    $message = Swift_Message::newInstance()
                        ->setSubject('Forgotten Password - ToDo')
                        ->setFrom(array('kamilsmtptest@gmail.com' => 'ToDo'))
                        ->setTo(array($user->email => $user->username))
                    //todo: add dynamic content to mailBody
                        ->setBody('ResetPassword http://todo.localhost/account/resetpassword/' . $token->token, 'text/html');

                    $mailer->send($message);

                    $this->template->messages["success"] = array("Forgotten Password" => "Email has been sent");
                }
                catch (Exception $e)
                {
                    $this->template->messages["error"] = array("Forgotten Password" => "Can't sent email. Contact Admin");
                }
            }
        }
    }

    public function action_resetPassword()
    {
        $tokenId = $this->request->param("id");
        $token = Model_User_Token::factory('user_token')->where("token","=", $tokenId)->find();
        if($token->loaded())
        {
            if($this->_changePassword(ORM::factory("user", $token->user_id)))
            {
                $token->delete();
                $this->template->messages["success"] = array("Reset Password" => "Password has been reset");
            }
            else
            {
                $this->template->messages["error"] = array("Reset Password" => "Can't change password");
            }
        }
        else
        {
            $this->template->messages["error"] = array("Reset Password" => "Can't change password. Token not exists or has expired");
        }
    }

    public function _changePassword($user)
    {
        $post = $this->request->post();
        if (isset($post["password"]) && !empty($post["password"]))
        {
            try
            {
                $extraValid = Validation::factory($post);
                $user->password = $post["password"];
                $extraValid->rule("password", "min_length", array(':value', '6'));
                $user->save($extraValid);
            }
            catch (ORM_Validation_Exception $e)
            {
                $this->template->errors =  $e->errors('');
            }
            return TRUE;
        }
        return FALSE;
    }

    private function _activateUser($user)
    {
        try
        {
            if($user->loaded())
            {
                $user->isActive = 1;
                $user->save();
                return TRUE;
            }
            return FALSE;
        }
        catch (ORM_Validation_Exception $e)
        {
            $this->template->errors =  $e->errors('');
        }
    }

    /**
     * @param $user user Auth Entity
     */
    private function _registerUser($user)
    {
        $post = $this->request->post();

        if(isset($post["username"]))
        {
            try
            {
                $extraValid = Validation::factory($post);

                if (isset($post["username"]))
                {
                    $user->username = $post["username"];
                    $extraValid->rule('username', "not_empty");
                }

                if (isset($post["email"]))
                {
                    $user->email = $post["email"];
                    $extraValid->rule('email', "not_empty");
                    $extraValid->rule('email', "email");
                }

                if (isset($post["password"]) && !empty($post["password"]))
                {
                    $user->password = $post["password"];
                    $extraValid->rule("password", "min_length", array(':value','6'));
                }

                $user->save($extraValid);

                $user->remove("roles");
                if(isset($post["role"]))
                    $user->add("roles", $post["role"]);
                else
                    $user->add("roles", 1);
                return $user;
            }
            catch (ORM_Validation_Exception $e)
            {
                $this->template->errors =  $e->errors('');
            }
        }
        return $user;
    }
}
