<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostContent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = config('blog.available_locales', ['en']);
        $categories = Category::all();
        
        Post::factory()->count(30)->create()->each(function($post) use ($locales, $categories) {
            // Assign 1-3 random categories to each post
            $categoryIds = $categories->random(rand(1, 3))->pluck('id');
            foreach ($categoryIds as $categoryId) {
                DB::table('posts_of_categories')->insert([
                    'post_id' => $post->id,
                    'category_id' => $categoryId
                ]);
            }

            // Create content for each locale
            foreach ($locales as $locale) {
                $content = PostContent::factory()->create([
                    'lang' => $locale,
                    'title' => $this->generateLocalizedPostTitle($locale, $post->id),
                    'url' => $this->generateLocalizedPostSlug($locale, $post->id),
                    'content' => $this->generateLocalizedPostContent($locale),
                ]);
                
                DB::table('contents_of_posts')->insert([
                    'post_id' => $post->id,
                    'content_id' => $content->id
                ]);
            }
        });
    }

    /**
     * Generate localized post title based on language
     */
    private function generateLocalizedPostTitle($locale, $postId)
{
    $titles = [
        'en' => [
            'The Future of Artificial Intelligence',
            'Sustainable Living Practices',
            'Modern Web Development Trends',
            'Healthy Eating Habits',
            'Travel Destinations for 2024'
        ],
        'pl' => [
            'Przyszłość sztucznej inteligencji',
            'Zrównoważone praktyki życiowe',
            'Nowoczesne trendy w rozwoju web',
            'Zdrowe nawyki żywieniowe',
            'Destynacje podróżnicze na 2024'
        ],
        'es' => [
            'El Futuro de la Inteligencia Artificial',
            'Prácticas de Vida Sostenible',
            'Tendencias Modernas de Desarrollo Web',
            'Hábitos Alimenticios Saludables',
            'Destinos de Viaje para 2024'
        ],
        'fr' => [
            'L\'Avenir de l\'Intelligence Artificielle',
            'Pratiques de Vie Durable',
            'Tendances Modernes du Développement Web',
            'Habitudes Alimentaires Saines',
            'Destinations de Voyage pour 2024'
        ],
        'ar' => [
            'مستقبل الذكاء الاصطناعي',
            'ممارسات الحياة المستدامة',
            'اتجاهات تطوير الويب الحديثة',
            'عادات الأكل الصحية',
            'وجهات السفر لعام 2024'
        ],
        'zh' => [
            '人工智能的未来',
            '可持续生活实践',
            '现代网络开发趋势',
            '健康饮食习惯',
            '2024年旅游目的地'
        ],
        'hi' => [
            'कृत्रिम बुद्धिमत्ता का भविष्य',
            'सतत जीवन प्रथाएं',
            'आधुनिक वेब विकास रुझान',
            'स्वस्थ खाने की आदतें',
            '2024 के लिए यात्रा स्थल'
        ],
        'ru' => [
            'Будущее искусственного интеллекта',
            'Устойчивые практики жизни',
            'Современные тенденции веб-разработки',
            'Здоровые привычки питания',
            'Туристические направления на 2024 год'
        ],
        'pt' => [
            'O Futuro da Inteligência Artificial',
            'Práticas de Vida Sustentável',
            'Tendências Modernas de Desenvolvimento Web',
            'Hábitos Alimentares Saudáveis',
            'Destinos de Viagem para 2024'
        ]
    ];

    $index = ($postId - 1) % 5;
    return $titles[$locale][$index] ?? $titles['en'][$index];
}

    /**
     * Generate localized slug
     */
    private function generateLocalizedPostSlug($locale, $postId)
    {
        $title = $this->generateLocalizedPostTitle($locale, $postId);
        return Str::slug($title . '-' . $postId);
    }

    /**
     * Generate localized post description
     */
    private function generateLocalizedPostDescription($locale)
    {
        $descriptions = [
            'en' => 'Discover insightful content and expert analysis on this topic. Learn from industry professionals and expand your knowledge in this field.',
            'pl' => 'Odkryj wnikliwe treści i eksperckie analizy na ten temat. Ucz się od profesjonalistów z branży i poszerzaj swoją wiedzę w tej dziedzinie.',
            'es' => 'Descubre contenido perspicaz y análisis experto sobre este tema. Aprende de profesionales de la industria y amplía tus conocimientos en este campo.',
            'fr' => 'Découvrez un contenu perspicace et une analyse experte sur ce sujet. Apprenez des professionnels du secteur et élargissez vos connaissances dans ce domaine.',
            'ar' => 'اكتشف محتوى ثاقب وتحليلات الخبراء حول هذا الموضوع. تعلم من محترفي الصناعة وقم بتوسيع معرفتك في هذا المجال.',
            'zh' => '发现关于这个主题的有见地的内容和专家分析。向行业专业人士学习并扩展您在该领域的知识。',
            'hi' => 'इस विषय पर अंतर्दृष्टिपूर्ण सामग्री और विशेषज्ञ विश्लेषण खोजें। उद्योग के पेशेवरों से सीखें और इस क्षेत्र में अपना ज्ञान बढ़ाएं।',
            'ru' => 'Откройте для себя проницательный контент и экспертный анализ по этой теме. Учитесь у профессионалов отрасли и расширяйте свои знания в этой области.',
            'pt' => 'Descubra conteúdo perspicaz e análise especializada sobre este tópico. Aprenda com profissionais do setor e expanda seus conhecimentos neste campo.',
        ];

        return $descriptions[$locale] ?? $descriptions['en'];
    }

    /**
     * Generate localized post content
     */
  private function generateLocalizedPostContent($locale)
{
    $contents = [
        'en' => '<p>This comprehensive article explores the latest developments and trends in the field. We delve deep into the subject matter, providing expert insights and practical advice for readers.</p><p>Understanding these concepts is crucial for staying ahead in today\'s rapidly evolving landscape. Our analysis covers both theoretical foundations and real-world applications.</p><h2>Key Takeaways</h2><ul><li>Important concept explained in detail</li><li>Practical implementation strategies</li><li>Future trends and predictions</li><li>Expert recommendations and best practices</li></ul>',
        
        'pl' => '<p>Ten kompleksowy artykuł bada najnowsze rozwinięcia i trendy w tej dziedzinie. Zagłębiamy się głęboko w temat, zapewniając eksperckie spostrzeżenia i praktyczne porady dla czytelników.</p><p>Zrozumienie tych koncepcji jest kluczowe dla utrzymania przewagi w dzisiejszym szybko rozwijającym się krajobrazie. Nasza analiza obejmuje zarówno teoretyczne podstawy, jak i praktyczne zastosowania.</p><h2>Kluczowe wnioski</h2><ul><li>Ważna koncepcja szczegółowo wyjaśniona</li><li>Strategie praktycznej implementacji</li><li>Przyszłe trendy i przewidywania</li><li>Rekomendacje ekspertów i najlepsze praktyki</li></ul>',
        
        'es' => '<p>Este artículo integral explora los últimos desarrollos y tendencias en el campo. Profundizamos en el tema, proporcionando información experta y consejos prácticos para los lectores.</p><p>Comprender estos conceptos es crucial para mantenerse a la vanguardia en el panorama actual en rápida evolución. Nuestro análisis cubre tanto los fundamentos teóricos como las aplicaciones del mundo real.</p><h2>Conclusiones clave</h2><ul><li>Concepto importante explicado en detalle</li><li>Estrategias de implementación práctica</li><li>Tendencias y predicciones futuras</li><li>Recomendaciones de expertos y mejores prácticas</li></ul>',
        
        'fr' => '<p>Cet article complet explore les derniers développements et tendances dans le domaine. Nous approfondissons le sujet, fournissant des insights d\'experts et des conseils pratiques pour les lecteurs.</p><p>Comprendre ces concepts est crucial pour rester en avance dans le paysage en évolution rapide d\'aujourd\'hui. Notre analyse couvre à la fois les fondements théoriques et les applications réelles.</p><h2>Points clés à retenir</h2><ul><li>Concept important expliqué en détail</li><li>Stratégies de mise en œuvre pratique</li><li>Tendances et prédictions futures</li><li>Recommandations d\'experts et meilleures pratiques</li></ul>',
        
        'ar' => '<p>تستكشف هذه المقالة الشاملة أحدث التطورات والاتجاهات في هذا المجال. نحن نخوض بعمق في الموضوع، ونقدم رؤى الخبراء ونصائح عملية للقراء.</p><p>فهم هذه المفاهيم أمر بالغ الأهمية للبقاء في المقدمة في المشهد سريع التطور اليوم. يغطي تحليلنا كل من الأسس النظرية والتطبيقات العملية.</p><h2>الاستنتاجات الرئيسية</h2><ul><li>مفهوم مهم موضح بالتفصيل</li><li>استراتيجيات التنفيذ العملي</li><li>الاتجاهات المستقبلية والتوقعات</li><li>توصيات الخبراء وأفضل الممارسات</li></ul>',
        
        'zh' => '<p>这篇全面的文章探讨了该领域的最新发展和趋势。我们深入探讨主题，为读者提供专家见解和实用建议。</p><p>理解这些概念对于在当今快速发展的环境中保持领先地位至关重要。我们的分析涵盖了理论基础和实际应用。</p><h2>关键要点</h2><ul><li>重要概念详细解释</li><li>实际实施策略</li><li>未来趋势和预测</li><li>专家推荐和最佳实践</li></ul>',
        
        'hi' => '<p>यह व्यापक लेख क्षेत्र में नवीनतम विकास और रुझानों की पड़ताल करता है। हम विषय की गहराई में जाते हैं, पाठकों के लिए विशेषज्ञ अंतर्दृष्टि और व्यावहारिक सलाह प्रदान करते हैं।</p><p>आज के तेजी से विकसित हो रहे परिदृश्य में आगे बने रहने के लिए इन अवधारणाओं को समझना महत्वपूर्ण है। हमारा विश्लेषण सैद्धांतिक नींव और वास्तविक दुनिया के अनुप्रयोगों दोनों को कवर करता है।</p><h2>मुख्य बातें</h2><ul><li>महत्वपूर्ण अवधारणा विस्तार से समझाई गई</li><li>व्यावहारिक कार्यान्वयन रणनीतियाँ</li><li>भविष्य के रुझान और भविष्यवाणियाँ</li><li>विशेषज्ञ सिफारिशें और सर्वोत्तम अभ्यास</li></ul>',
        
        'ru' => '<p>Эта всеобъемлющая статья исследует последние разработки и тенденции в данной области. Мы глубоко погружаемся в тему, предоставляя экспертные insights и практические советы для читателей.</p><p>Понимание этих концепций имеет crucialное значение для того, чтобы оставаться впереди в быстро развивающемся ландшафте сегодняшнего дня. Наш анализ охватывает как теоретические основы, так и реальные приложения.</p><h2>Ключевые выводы</h2><ul><li>Важная концепция подробно объяснена</li><li>Стратегии практической реализации</li><li>Будущие тенденции и прогнозы</li><li>Рекомендации экспертов и лучшие практики</li></ul>',
        
        'pt' => '<p>Este artigo abrangente explora os últimos desenvolvimentos e tendências no campo. Aprofundamo-nos no assunto, fornecendo insights especializados e conselhos práticos para os leitores.</p><p>Compreender esses conceitos é crucial para manter-se à frente no cenário em rápida evolução de hoje. Nossa análise cobre tanto os fundamentos teóricos quanto as aplicações do mundo real.</p><h2>Principais conclusões</h2><ul><li>Conceito importante explicado em detalhes</li><li>Estratégias de implementação prática</li><li>Tendências e previsões futuras</li><li>Recomendações de especialistas e melhores práticas</li></ul>'
    ];

    return $contents[$locale] ?? $contents['en'];
}
}