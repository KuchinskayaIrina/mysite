<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        /**
         * Create super admin
         */
        $user = new User();
        $user->email = 'iriska.pysik@gmail.com';
        $user->password = Hash::make('12345678');
        $user->userName = 'Irinka';
        $user->isAdmin = true;
        $user->isActive = true;
        $user->activationCode = '';
        $user->remember_token = self::generateRandomString(100);
        $user-> save();
        /**
         * Creates users
         */
        $count = rand(1,10);
        for ($i = 0; $i < $count; $i++) {
            $user = new User();
            $user->email = 'user_'.$i.'@mysite.dev';
            $user->password = Hash::make('12345678');
            $user->userName = 'user_'.$i;
            $user->isAdmin = false;
            $user->isActive = rand(0,1);
            $user->activationCode = '';
            $user->remember_token = self::generateRandomString(100);
            $user-> save();
        }

    }

    /**
     * Generate random string
     *
     * @param int $length
     * @return string
     */

    private function generateRandomString($length = 10) {
        $characters = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <$length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}