<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConstant extends Model
{
    const DEFAULT_PER_PAGE = 4;
    const USER_ARTICLE_PER_PAGE = 10;
    const HOME_ARTICLE_PER_PAGE = 4;
}
