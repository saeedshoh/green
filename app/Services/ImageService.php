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
            $file = request()->file('avatar')->store('avatars', ['disk' => 'public']);
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
            $file = request()->file('image')->store('gift', ['disk' => 'public']);
            $gift->image = "/storage/" . $file;
            $gift->save();
        }
    }


    /**
     * Сохранить аватар пользователья
     */
    public function uploadCategoryIcon($category)
    {
        if (request()->file('icon')) {
            $file = request()->file('icon')->store('icons', ['disk' => 'public']);
            $category->icon = "/storage/" . $file;
            $category->save();
        }

        return $category->icon;
    }
}
