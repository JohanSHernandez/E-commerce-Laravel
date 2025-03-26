<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'The Future of Smartphones',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl.',
                'author' => 'John Doe',
                'blog_category_id' => 1,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Top 10 Fashion Trends This Season',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl.',
                'author' => 'Jane Smith',
                'blog_category_id' => 2,
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Easy Recipes for Beginners',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl.',
                'author' => 'Chef Mike',
                'blog_category_id' => 3,
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'Must-Visit Destinations in 2023',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl.',
                'author' => 'Travel Guide',
                'blog_category_id' => 4,
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'The Rise of AI in Everyday Life',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl. Nullam auctor, nisl eget ultricies aliquam, nunc nisl aliquet nunc, quis aliquam nisl nunc quis nisl.',
                'author' => 'Tech Analyst',
                'blog_category_id' => 1,
                'published_at' => Carbon::now()->subDays(10),
            ],
        ];
        
        foreach ($articles as $article) {
            $createdArticle = Article::create($article);
            
            for ($i = 1; $i <= 3; $i++) {
                Comment::create([
                    'content' => "This is comment $i for this article. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                    'username' => "User $i",
                    'email' => "user$i@example.com",
                    'article_id' => $createdArticle->id,
                ]);
            }
        }
    }
}
