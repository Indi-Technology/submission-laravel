<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = Article::create([
            'title' => 'How to quickly deploy a static website',
            'full_text' => "In the dynamic landscape of web development, static websites have gained significant traction due to their simplicity and efficiency in launching online projects swiftly. These websites, once regarded as basic HTML pages, have evolved into sophisticated platforms that underpin a multitude of online ventures, influencing both web designers and developers. They serve as the foundation for various tools and frameworks that streamline the web development process, catering to the needs of seasoned developers and novices alike.

                            The process of deploying a static website efficiently involves several key steps. Firstly, it's crucial to choose the appropriate tools for building and managing the website. Options such as Jekyll, Hugo, or Gatsby, which are static site generators, automate the conversion of content into HTML pages, simplifying the development process. Additionally, employing version control systems like Git facilitates change tracking and collaboration among team members.

                            Once the tools are in place, the next step is to create the website's structure and design using HTML, CSS, and possibly JavaScript. Keeping the design clean and minimalistic ensures fast loading times and optimal performance, as static websites don't rely on server-side processing. Performance optimization techniques, such as minifying CSS and JavaScript files, optimizing images, and leveraging caching mechanisms, further enhance user experience and search engine rankings.

                            Selecting a hosting provider that supports static website hosting is essential for seamless deployment. Platforms like Amazon S3, GitHub Pages, Netlify, and Vercel offer straightforward deployment processes, along with features such as custom domains, SSL certificates, and CI/CD pipelines. Deploying the website involves uploading HTML, CSS, and other assets to the hosting provider's storage location and configuring domain settings if necessary.

                            After deployment, thorough testing across different devices and browsers is imperative to ensure compatibility and responsiveness. Any broken links, missing assets, or layout issues should be addressed promptly to maintain the integrity of the site. Regular monitoring for performance issues, security vulnerabilities, and outdated content, coupled with analytics tracking to gather visitor metrics, ensures the website remains optimized and up-to-date.

                            In conclusion, mastering the art of deploying static websites efficiently is essential for establishing a solid online presence. With their simplicity, speed, and reliability, static websites are ideal for various projects and applications, whether it be a personal blog, portfolio site, or business landing page. By following the outlined steps, developers and designers can navigate the deployment process with ease, setting themselves up for success in the digital realm.",
            'image' => NULL,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => '2024-02-12 01:32:25',
            'updated_at' => '2024-02-12 12:42:34',
        ]);

        $tags = Tag::findMany([1, 2]);
        $article->tags()->sync($tags->pluck('id')->toArray());
    }
}
