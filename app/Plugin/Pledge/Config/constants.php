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
class ConstPledgeProjectStatus
{
    const Pending = 1;
    const OpenForFunding = 2;
    const FundingClosed = 3;
    const FundingExpired = 4;
    const ProjectCanceled = 5;
    const GoalReached = 6;
    const OpenForIdea = 8;
    const PendingAction = 9;
}
?>