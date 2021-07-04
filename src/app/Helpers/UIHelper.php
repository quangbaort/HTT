<?php
namespace App\Helpers;
class UIHelper
{
    public static function role($role)
    {
        $text = '';
        switch ($role) {
            case 1:
                $text = 'Admin';
                break;
            case 2 :
                $text = 'Kiểm duyệt viên';
                break;
            default:
                $text = 'Thành viên';
                break;
        }
        return $text;
    }
}
