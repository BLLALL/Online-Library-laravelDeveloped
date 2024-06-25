<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create(
             [
                 'name' => 'Salah El-Din',
                 'email' => 'saloh@gmail.com',
                 'password' => Hash::make('salah12')
             ]
         );

        $author = Author::factory()->create([
            'name' => 'أحمد شوقي',
            'author_photo' => 'احمد شوقي.jpg',
            'description' => 'احمد شوقي علي أحمد شوقي بك (16 أكتوبر 1868 - 14 أكتوبر 1932)، كاتب وشاعر مصري يعد أعظم شعراء العربية في العصور الحديثة، يلقب بـ «أمير الشعراء».'
        ]);

        $category = Category::factory()->create([
            'name' => 'قسم الادب العربي',
            'category_photo' => 'الادب العربي.jpg'
        ]);

        Book::factory()->create([
            'title' => 'الشوقيات',
            'author_id' => $author->id,
            'category_id' => $category->id,
            'description' => 'أربعة وستون عاماً، تلك هي المساحة الزمنية التي منحها الله لأحمد شوقي على سطح هذه الأرض (1868-1932)، ولكنه في هذه المساحة المحدودة ذاع شعره في الدنيا، وشغل الناس، وملأ جميع الأسماع، وأشجى كثيراً من القلوب.و كما شغل الناس في حياة صاحبه شغلهم بعد وفاته، ولا يزال حتى الآن يشغل الرواد، وسيظل مدخلاً يتوصل به إلى خصائص الشعر العربي في عتقه وأصالته، ومَعْلماً بارزاً يدل على مستوى وأبلغه الشعر العربي في عصر النهضة. ',
            'book' => 'الشوقيات.pdf',
            'price' => 0,
            'bookCover' => 'الشوقيات.jpg'
        ]);

    }
}
