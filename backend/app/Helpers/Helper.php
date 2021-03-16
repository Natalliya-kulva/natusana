<?php

namespace App\Helpers;

use Spatie\MediaLibrary\Models\Media;

class Helper
{
    public static function isBase64($base64data)
    {
        // strip out data uri scheme information (see RFC 2397)
        if (strpos($base64data, ';base64') !== false) {
            [$_, $base64data] = explode(';', $base64data);
            [$_, $base64data] = explode(',', $base64data);
        }

        // strict mode filters for non-base64 alphabet characters
        if (base64_decode($base64data, true) === false) {
            return false;
        }

        // decoding and then reencoding should not change the data
        if (base64_encode(base64_decode($base64data)) !== $base64data) {
            return false;
        }

        return true;
    }

    public static function getBase64Extension($base64data)
    {
        $img = explode(',', $base64data);
        $ini = substr($img[0], 11);
        $type = explode(';', $ini);
        return $type[0];
    }

    public static function getMediaData(Media $media)
    {
        $data = [
            'id' => $media->id,
            'url' => $media->getUrl(),
            'extension' => $media->getExtensionAttribute(),
            'size' => $media->getHumanReadableSizeAttribute(),
            'conversions' => []
        ];

        foreach ( $media->getGeneratedConversions() as $conversionName=>$generated ) {
            if ( $generated ) {
                $data['conversions'][$conversionName] = $media->getUrl($conversionName);
            }
        }

        return $data;
    }
}