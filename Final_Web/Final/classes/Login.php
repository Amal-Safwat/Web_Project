<?php

class Login
{
        public static function isLoggedIn()
        {

                if (isset($_COOKIE['SNID']))
                {
                        if (DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID']))))
                        {
                                $userid = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['user_id'];

                                if (isset($_COOKIE['SNID_']))
                                {
                                        return $userid;
                                }
                                else
                                {
                                        $cstrong = True;
                                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                        $date_created = date('Y-m-d H:i:s');
                                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id, :date_created)', array(':token'=>sha1($token), ':user_id'=>$userid, ':date_created'=>$date_created));
                                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));

                                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid;
                                }
                        }else if (DB::query('SELECT user_id FROM login_tokens_manger WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID']))))
                        {
                                $userid = DB::query('SELECT user_id FROM login_tokens_manger WHERE token=:token', array(':token'=>sha1($_COOKIE['SNIDA'])))[0]['user_id'];

                                if (isset($_COOKIE['SNIDA_']))
                                {
                                        return $userid;
                                }
                                else
                                {
                                        $cstrong = True;
                                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                        $date_created = date('Y-m-d H:i:s');
                                        DB::query('INSERT INTO login_tokens_manger VALUES (\'\', :token, :user_id, :date_created)', array(':token'=>sha1($token), ':user_id'=>$userid, ':date_created'=>$date_created));
                                        DB::query('DELETE FROM login_tokens_manger WHERE token=:token', array(':token'=>sha1($_COOKIE['SNIDA'])));

                                        setcookie("SNIDA", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                                        setcookie("SNIDA_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid;
                                }
                        }
                }
              else if (isset($_COOKIE['SNIDA']))
                {
                        if (DB::query('SELECT user_id FROM login_tokens_manger WHERE token=:token', array(':token'=>sha1($_COOKIE['SNIDA']))))
                        {
                                $userid = DB::query('SELECT user_id FROM login_tokens_manger WHERE token=:token', array(':token'=>sha1($_COOKIE['SNIDA'])))[0]['user_id'];

                                if (isset($_COOKIE['SNIDA_']))
                                {
                                        return $userid;
                                }
                                else
                                {
                                        $cstrong = True;
                                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                        $date_created = date('Y-m-d H:i:s');
                                        DB::query('INSERT INTO login_tokens_manger VALUES (\'\', :token, :user_id, :date_created)', array(':token'=>sha1($token), ':user_id'=>$userid, ':date_created'=>$date_created));
                                        DB::query('DELETE FROM login_tokens_manger WHERE token=:token', array(':token'=>sha1($_COOKIE['SNIDA'])));

                                        setcookie("SNIDA", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                                        setcookie("SNIDA_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid;
                                }
                        }
                }

                return false;
        }
}

?>
