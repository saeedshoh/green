<?php

namespace App\Services;

/**
 * Class ImageService.
 */
class ImageService
{
    /**
     * Сохранить аватар пользователья
     */
    public function uploadImage($user)
    {
        if (request()->file('avatar')) {
            $file = request()->file('avatar')->store('avatars', ['disk' => 'files']);
            $user->avatar = "/storage/" . $file;
            $user->save();
        }

        return $user->avatar;
    }

    /**
     * Сохранить изображение для приза
     */
    public function uploadGiftImage($gift)
    {
        if (request()->file('image')) {
            $file = request()->file('image')->store('place', ['disk' => 'files']);
            $gift->image = "/files/" . $file;
            $gift->save();
        }
    }


    /**
     * Сохранить аватар пользователья
     */
    public function uploadCategoryIcon($category)
    {
        if (request()->file('icon')) {
            $file = request()->file('icon')->store('place', ['disk' => 'files']);
            $category->icon = "/files/" . $file;
            $category->save();
        }

        return $category->icon;
    }

    /**
     * Сохранить аватар пользователья
     */
    public function uploadPlaceImage($place)
    {
        if (request()->file('image')) {
            $file = request()->file('image')->store('place', ['disk' => 'files']);
            $place->image = '/files/'.$file;
            $place->save();
        }

        return $place->image;
    }
}
