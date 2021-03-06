<?php

/**
 * @package GravatarHelper.php
 *
 * @author David Yell <neon1024@gmail.com>
 *
 */

namespace NiceAdmin\View\Helper;

use Cake\View\Helper;

class GravatarHelper extends Helper
{

    /**
     * Generate a gravatar avatar image
     *
     * @param string $email Users email address
     * @param int $size Pixel size of avatar
     * @param string $class A css class attribute for the image
     *
     * @return string
     */
    public function avatar($email, $size = 50, $class = 'user-avatar')
    {
        $hash = md5(strtolower(trim($email)));
        return "<img class='$class' src='//www.gravatar.com/avatar/$hash?s=$size&d=mm'>";
    }
}
