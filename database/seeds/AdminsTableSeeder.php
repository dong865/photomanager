<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=factory(Admin::class,10)->create();
        // 创建一个用户
        $user=$users[0];
        $user->name='admin';
        $user->nickname='保修三年';
        $user->password=bcrypt('admin888');
        $user->email='865832@qq.com';
        $user->save();
        // 将 1 号用户指派为『站长』
        // assignRole() 方法在 HasRoles 中定义，已在 User 模型中加载了它。
        $user->assignRole('Founder');
        // 再创建一个用户
        $user_2=$users[1];
        $user_2->name='dong';
        $user_2->nickname='合并同类项';
        $user_2->password=bcrypt('admin888');
        $user_2->email='dong@qq.com';
        $user_2->save();
        // 将 2 号用户指派为『管理员』
        $user_2->assignRole('Maintainer');
    }
}
