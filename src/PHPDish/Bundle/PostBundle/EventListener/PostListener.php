<?php

namespace PHPDish\Bundle\PostBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use PHPDish\Bundle\PostBundle\Model\PostInterface;
use PHPDish\Bundle\PostBundle\Service\PostManagerInterface;
use PHPDish\Bundle\UserBundle\Model\UserInterface;
use PHPDish\Bundle\UserBundle\Service\UserManagerInterface;

final class PostListener
{
    /**
     * @var PostManagerInterface
     */
    protected $postManager;

    /**
     * @var UserManagerInterface
     */
    protected $userManager;

    public function __construct(
        PostManagerInterface $postManager,
        UserManagerInterface $userManager
    )
    {
        $this->postManager = $postManager;
        $this->userManager = $userManager;
    }

    /**
     * 生成新数据之前
     * @param PostInterface $post
     * @param LifecycleEventArgs $event
     */
    public function postPersist(PostInterface $post, LifecycleEventArgs $event)
    {
        $user = $post->getUser();
        $this->handleUserPostCount($user);
    }

    /**
     * 刷新实体
     * @param PostInterface $post
     * @param LifecycleEventArgs $event
     */
    public function postUpdate(PostInterface $post, LifecycleEventArgs $event)
    {
        $user = $post->getUser();
        $this->handleUserPostCount($user);
    }

    /**
     * 处理用户的文章数量
     * @param UserInterface $user
     */
    protected function handleUserPostCount(UserInterface $user)
    {
        $count = $this->postManager->getUserPostCount($user);
        $user->setPostCount($count);
        $this->userManager->saveUser($user);
    }
}