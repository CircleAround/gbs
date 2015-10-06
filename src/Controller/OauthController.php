<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Oauth Controller
 *
 * @property \App\Model\Table\OauthTable $Oauth
 */
class OauthController extends AppController
{

    public function github()
    {
        $provider = new \League\OAuth2\Client\Provider\Github([
            'clientId'          => env('GITHUB_CLIENT_ID'),
            'clientSecret'      => env('GITHUB_CLIENT_SECRET'),
            'redirectUri'       => env('GITHUB_REDIRECT_URI'),
        ]);

        if (!isset($this->request->query['code'])) {
            // If we don't have an authorization code then get one
            $authUrl = $provider->getAuthorizationUrl($options);
            // $_SESSION['oauth2state'] = $provider->getState(); // stateをつけるともっとセキュアに！
            $this->redirect($authUrl);

        // Check given state against previously stored one to mitigate CSRF attack
        // stateのチェック
        // } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

        //     unset($_SESSION['oauth2state']);
        //     exit('Invalid state');

        } else {

            // Try to get an access token (using the authorization code grant)
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $this->request->query['code']
            ]);

            // Optional: Now you have a token you can look up a users profile data
            try {

                // We got an access token, let's now get the user's details
                $user = $provider->getResourceOwner($token);
                // githubユーザー情報を配列で取得
                $user_to_array = $user->toArray();

                // 登録済みか確認
                $query = TableRegistry::get('Users')->find();
                $signed_up_user = $query->where(['uid' => $user_to_array['id']])->first();


                if (isset($signed_up_user['uid'])) {
                    // 登録済みだったら、ログインさせる
                    $session = $this->request->session()->write('user_id', $signed_up_user['id']);
                    // 一時的なリダイレクト先
                    $this->redirect('/threads/index');
                } else {
                    // 未登録の場合はデータベースに登録する
                    $usersTable = TableRegistry::get('Users');
                    $new_user = $usersTable->newEntity();
                    $data = [
                        'name' => (empty($user->getName())) ? $user->getNickname() : $user->getName(),
                        'uid' => $user->getId(),
                        'nickname' => $user->getNickname(),
                        'avator' => $user_to_array['avatar_url'],
                        'access_token' => $token->getToken(),
                        'email' => $user->getEmail()
                    ];
                    $new_user->set($data); // created_atを自動でセット
                    $usersTable->save($new_user);
                    // ログインさせる
                    $this->request->session()->write('user_id', $new_user->id);
                    // 一時的なリダイレクト先
                    $this->redirect('/threads/index');
                }

            } catch (Exception $e) {

                // Failed to get user details
                exit('Oh dear...');
            }
        }
    }
}
