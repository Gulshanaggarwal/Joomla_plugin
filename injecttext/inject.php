<?php
/**
 * File Doc Comment_
 * PHP version 5
 *
 * @category  Component
 * @package   Joomla.Administrator
 * @author    Joomla! <admin@joomla.org>
 * @copyright (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 * @link      admin@joomla.org
 */

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;
use Joomla\Event\Event;
use Joomla\CMS\Factory;

/**
 * PlgSystemTour
 *
 * @since  __DEPLOY_VERSION__
 */

class PlgInjectHeadline extends CMSPlugin implements SubscriberInterface{

    /**
	 * Load the language file on instantiation
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Application object.
	 *
	 * @var    JApplicationCms
	 * @since  __DEPLOY_VERSION__
	 */
	protected $app;

	/**
	 * Application object.
	 *
	 * @var    JApplicationCms
	 * @since  __DEPLOY_VERSION__
	 */
    protected $inject;

    /**
	 * return an array of events susbcriber will listen
	 *
	 * @return array
	 */

    public static function getSubscribedEvents(): array
	{
		return [
			'onAfterDispatch'=>'onAfterDispatch',
		];
	}

    /**
	 * on before render event triggered
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */

     function onAfterDispatch(){
         $wa = Factory::getApplication()->getDocument()->getWebAssetManager();
         $wa->registerAndUseScript('plg_system_injectheadline', 'plg_system_injectheadline/main.js', []);

     }

}