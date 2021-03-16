<?php

namespace App\Models\Demo;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;
use \Encore\Admin\Traits\Resizable;

class Test extends Model
{
    use DefaultDatetimeFormat;
    use Resizable;

    const INT_DEFAULT = 0;
    const INT_FIRST = 1;
    const INT_SECOND = 2;

    public static $humanInt = [
        self::INT_DEFAULT => 'Не определено',
        self::INT_FIRST => 'Первый',
        self::INT_SECOND => 'Второй',
    ];

    const STRING_DEFAULT = 'default';
    const STRING_FIRST = 'first';
    const STRING_SECOND = 'second';

    public static $humanStr = [
        self::STRING_DEFAULT => 'Не определено',
        self::STRING_FIRST => 'Первый',
        self::STRING_SECOND => 'Второй',
    ];

    const BOOL_TRUE = true;
    const BOOL_FALSE = false;

    public static $humanBool = [
        self::BOOL_TRUE => 'Вкл',
        self::BOOL_FALSE => 'Выкл'
    ];

    public static $imageThumbnails = [
        'x_100' => [100, null],
        'x_200' => [200, null],
        'x_300' => [500, null],
    ];

    protected $attributes = array(
        'text' => '',
        'textarea' => '',

        'radio_str' => '',
        'radio_int' => self::INT_DEFAULT,
        'radio_bool' => self::BOOL_TRUE,

        'checkbox_str' => '',

        'select_str' => '',
        'select_int' => self::INT_DEFAULT,

        'image' => '',
        'file' => '',
        'multiple_images' => '[]'
    );

    protected $casts = [
        'radio_bool' => 'boolean',
        'checkbox_str' => 'array',
        'multiple_images' => 'array',
    ];

    protected $fillable = [
        'text',
        'textarea',

        'radio_str',
        'radio_int',
        'radio_bool',

        'checkbox_str',

        'select_str',
        'select_int',
        'image',
        'multiple_images'
    ];

    protected $appends = [
        'image_thumbnails',
        'multiple_images_thumbnails'
    ];

    public function getImageThumbnailsAttribute() {
        $thumbnails = [];
        foreach (self::$imageThumbnails as $key=>$imageThumbnail) {
            $thumbnails[$key] = $this->getThumbnail($this->image, $key);
        }
        $thumbnails['original'] = $this->image;
        return $thumbnails;
    }

    public function getMultipleImagesThumbnailsAttribute() {
        $thumbnails = [];
        foreach ($this->multiple_images as $multiple_image) {
            $image = [];
            foreach (self::$imageThumbnails as $key=>$imageThumbnail) {
                $image[$key] = $this->getThumbnail($multiple_image, $key);
            }
            $image['original'] = $this->image;
            $thumbnails[] = $image;
        }
        return $thumbnails;
    }
}
