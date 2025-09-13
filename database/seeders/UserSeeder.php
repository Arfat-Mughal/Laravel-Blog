<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@laravel-blog.test',
                'website' => 'https://laravel-blog.test',
                'password' => 'password',
                'url' => 'super-admin',
                'roles' => [1] // admin role
            ],
            [
                'name' => 'moderator',
                'first_name' => 'Super',
                'last_name' => 'Moderator',
                'email' => 'mod@laravel-blog.test',
                'website' => 'https://laravel-blog.test',
                'password' => 'password',
                'url' => 'super-moderator',
                'roles' => [2] // mod role
            ],
            [
                'name' => 'author',
                'first_name' => 'Content',
                'last_name' => 'Author',
                'email' => 'author@laravel-blog.test',
                'website' => 'https://laravel-blog.test',
                'password' => 'password',
                'url' => 'content-author',
                'roles' => [3] // author role (if exists)
            ]
        ];

        foreach ($users as $userData) {
            // Check if user already exists by email
            $existingUser = DB::table('users')
                ->where('email', $userData['email'])
                ->first();

            if ($existingUser) {
                // Update existing user
                DB::table('users')
                    ->where('id', $existingUser->id)
                    ->update([
                        'name' => $userData['name'],
                        'first_name' => $userData['first_name'],
                        'last_name' => $userData['last_name'],
                        'website' => $userData['website'],
                        'password' => Hash::make($userData['password']),
                        'url' => $userData['url'],
                        'updated_at' => now(),
                    ]);
                
                $userId = $existingUser->id;
            } else {
                // Create new user
                $userId = DB::table('users')->insertGetId([
                    'name' => $userData['name'],
                    'first_name' => $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email'],
                    'website' => $userData['website'],
                    'password' => Hash::make($userData['password']),
                    'url' => $userData['url'],
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'remember_token' => Str::random(10),
                ]);

                // Create multi-language content for author users
                if (in_array(3, $userData['roles']) || $userData['name'] === 'author') {
                    $locales = config('blog.available_locales');
                    foreach ($locales as $locale) {
                        $content = \App\Models\Content::factory()->create([
                            'lang' => $locale,
                            'title' => $this->generateLocalizedAuthorTitle($locale),
                            'description' => $this->generateLocalizedAuthorDescription($locale),
                        ]);
                        DB::table('author_contents')->insert([
                            'user_id' => $userId,
                            'content_id' => $content->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }

            // Assign roles to user
            $this->assignRoles($userId, $userData['roles']);
        }
    }

    /**
     * Assign roles to a user, ensuring no duplicates
     */
    private function assignRoles(int $userId, array $roleIds): void
    {
        foreach ($roleIds as $roleId) {
            // Check if role exists
            $roleExists = DB::table('roles')->where('id', $roleId)->exists();
            
            if ($roleExists) {
                // Check if role assignment already exists
                $existingAssignment = DB::table('users_roles')
                    ->where('user_id', $userId)
                    ->where('role_id', $roleId)
                    ->exists();

                if (!$existingAssignment) {
                    DB::table('users_roles')->insert([
                        'user_id' => $userId,
                        'role_id' => $roleId
                    ]);
                }
            }
        }

        // Optional: Remove roles that are not in the provided list
        // DB::table('users_roles')
        //     ->where('user_id', $userId)
        //     ->whereNotIn('role_id', $roleIds)
        //     ->delete();
    }

    private function generateLocalizedAuthorTitle($locale)
    {
        $titles = [
            'en' => 'About the Author',
            'pl' => 'O Autorze',
            'es' => 'Acerca del Autor',
            'fr' => 'À propos de l\'Auteur',
            'ar' => 'عن المؤلف',
            'zh' => '关于作者',
            'hi' => 'लेखक के बारे में',
            'ru' => 'О авторе',
            'pt' => 'Sobre o Autor',
        ];

        return $titles[$locale] ?? $titles['en'];
    }

    private function generateLocalizedAuthorDescription($locale)
    {
        $descriptions = [
            'en' => 'Passionate writer and content creator with years of experience in blogging.',
            'pl' => 'Pasjonujący pisarz i twórca treści z wieloletnim doświadczeniem w blogowaniu.',
            'es' => 'Escritor apasionado y creador de contenido con años de experiencia en blogs.',
            'fr' => 'Écrivain passionné et créateur de contenu avec des années d\'expérience en blogging.',
            'ar' => 'كاتب متحمس ومبدع محتوى مع سنوات من الخبرة في التدوين.',
            'zh' => '热情的作家和内容创作者，具有多年的博客经验。',
            'hi' => 'उत्साही लेखक और सामग्री निर्माता, ब्लॉगिंग में वर्षों का अनुभव।',
            'ru' => 'Страстный писатель и создатель контента с многолетним опытом ведения блога.',
            'pt' => 'Escritor apaixonado e criador de conteúdo com anos de experiência em blogs.',
        ];

        return $descriptions[$locale] ?? $descriptions['en'];
    }
}