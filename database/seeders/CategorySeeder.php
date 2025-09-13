<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = config('blog.available_locales', ['en']);
        
        Category::factory()->count(10)->create()->each(function($category) use ($locales) {
            foreach ($locales as $locale) {
                $content = Content::factory()->create([
                    'lang' => $locale,
                    'title' => $this->generateLocalizedTitle($locale, $category->id),
                    'url' => $this->generateLocalizedSlug($locale, $category->id),
                    'content' => $this->generateLocalizedDescription($locale),
                ]);
                
                DB::table('contents_of_categories')->insert([
                    'category_id' => $category->id,
                    'content_id' => $content->id
                ]);
            }
        });
    }

    /**
     * Generate localized title based on language
     */
    private function generateLocalizedTitle($locale, $categoryId)
    {
        $titles = [
            'en' => ['Technology', 'Science', 'Art', 'Travel', 'Food', 'Health', 'Sports', 'Music', 'Business', 'Education'],
            'pl' => ['Technologia', 'Nauka', 'Sztuka', 'Podróże', 'Jedzenie', 'Zdrowie', 'Sport', 'Muzyka', 'Biznes', 'Edukacja'],
            'es' => ['Tecnología', 'Ciencia', 'Arte', 'Viajes', 'Comida', 'Salud', 'Deportes', 'Música', 'Negocios', 'Educación'],
            'fr' => ['Technologie', 'Science', 'Art', 'Voyage', 'Nourriture', 'Santé', 'Sports', 'Musique', 'Affaires', 'Éducation'],
            'ar' => ['التكنولوجيا', 'العلوم', 'الفن', 'السفر', 'الطعام', 'الصحة', 'الرياضة', 'الموسيقى', 'الأعمال', 'التعليم'],
            'zh' => ['技术', '科学', '艺术', '旅行', '食物', '健康', '体育', '音乐', '商业', '教育'],
            'hi' => ['प्रौद्योगिकी', 'विज्ञान', 'कला', 'यात्रा', 'भोजन', 'स्वास्थ्य', 'खेल', 'संगीत', 'व्यवसाय', 'शिक्षा'],
            'ru' => ['Технологии', 'Наука', 'Искусство', 'Путешествия', 'Еда', 'Здоровье', 'Спорт', 'Музыка', 'Бизнес', 'Образование'],
            'pt' => ['Tecnologia', 'Ciência', 'Arte', 'Viagem', 'Comida', 'Saúde', 'Esportes', 'Música', 'Negócios', 'Educação'],
        ];

        $index = ($categoryId - 1) % 10;
        return $titles[$locale][$index] ?? $titles['en'][$index];
    }

    /**
     * Generate localized slug
     */
    private function generateLocalizedSlug($locale, $categoryId)
    {
        $title = $this->generateLocalizedTitle($locale, $categoryId);
        return \Illuminate\Support\Str::slug($title . '-' . $categoryId);
    }

    /**
     * Generate localized description
     */
    private function generateLocalizedDescription($locale)
    {
        $descriptions = [
            'en' => 'Discover amazing content in this category. Explore various topics and expand your knowledge.',
            'pl' => 'Odkryj niesamowite treści w tej kategorii. Poznaj różne tematy i poszerz swoją wiedzę.',
            'es' => 'Descubre contenido increíble en esta categoría. Explora varios temas y amplía tus conocimientos.',
            'fr' => 'Découvrez un contenu incroyable dans cette catégorie. Explorez divers sujets et élargissez vos connaissances.',
            'ar' => 'اكتشف محتوى رائعًا في هذه الفئة. استكشف مواضيع مختلفة ووسع معرفتك.',
            'zh' => '在此类别中发现精彩内容。探索各种主题并扩展您的知识。',
            'hi' => 'इस श्रेणी में अद्भुत सामग्री खोजें। विभिन्न विषयों का अन्वेषण करें और अपना ज्ञान बढ़ाएं।',
            'ru' => 'Откройте для себя удивительный контент в этой категории. Исследуйте различные темы и расширяйте свои знания.',
            'pt' => 'Descubra conteúdo incrível nesta categoria. Explore vários tópicos e expanda seu conhecimento.',
        ];

        return $descriptions[$locale] ?? $descriptions['en'];
    }
}