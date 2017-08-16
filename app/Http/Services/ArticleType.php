<?php
namespace App\Http\Services;

class ArticleType
{
    const PUBLIC_TYPE = 0; // 公开
    const PRIVATE_TYPE = 1; // 私人
    const DRAFT_TYPE = 2;  // 草稿

    public static $articleTypes = [
        self::PUBLIC_TYPE => '公开',
        self::PRIVATE_TYPE => '私人',
        self::DRAFT_TYPE => '草稿'
    ];
}