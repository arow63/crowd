<?php
/**
 * CrowdFunding
 *
 * PHP version 5
 *
 * @category   PHP
 * @package    Crowdfunding
 * @subpackage Core
 * @author     arow63 <info@arow63.com>
 * @copyright  2018 arow63 Infoway Private Ltd
 * @license    http://www.arow63.com/ arow63 Infoway Licence
 * @link       http://www.arow63.com
 */
class FriendsDetailsComponent extends Component
{
    public function startup(Controller $controller) 
    {
        App::import('Model', 'SocialMarketing.UserFollower');
        $this->UserFollower = new UserFollower();
        if (!empty($_SESSION['Auth']['User']['id'])) {
            $userFollowers = $this->UserFollower->find('list', array(
                'conditions' => array(
                    'UserFollower.user_id' => $_SESSION['Auth']['User']['id']
                ) ,
                'fields' => array(
                    'UserFollower.id',
                    'UserFollower.followed_user_id',
                )
            ));
            Configure::write('site.friend_ids', $userFollowers);
        }
    }
}
