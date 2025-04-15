<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'name' => '仙人',
                'area_id' => 1,
                'genre_id' => 1,
                'description' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E4%BB%99%E4%BA%BA.jpg',
            ],
            [
                'name' => '牛助',
                'area_id' => 2,
                'genre_id' => 2,
                'description' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E7%89%9B%E5%8A%A9.jpg',
            ],
            [
                'name' => '戦慄',
                'area_id' => 3,
                'genre_id' => 3,
                'description' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E6%88%A6%E6%85%84.jpg',
            ],
            [
                'name' => 'ルーク',
                'area_id' => 1,
                'genre_id' => 4,
                'description' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E3%83%AB%E3%83%BC%E3%82%AF.jpg',
            ],
            [
                'name' => '志摩屋',
                'area_id' => 3,
                'genre_id' => 5,
                'description' => 'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E5%BF%97%E6%91%A9%E5%B1%8B.jpg',
            ],
            [
                'name' => '香',
                'area_id' => 1,
                'genre_id' => 2,
                'description' => '大小さまざまなお部屋をご用意してます。デートや接待、記念日や誕生日など特別な日にご利用ください。皆様のご来店をお待ちしております。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E9%A6%99.jpg',
            ],
            [
                'name' => 'JJ',
                'area_id' => 2,
                'genre_id' => 4,
                'description' => 'イタリア製ピザ窯芳ばしく焼き上げた極薄のミラノピッツァや厳選されたワインをお楽しみいただけます。女子会や男子会、記念日やお誕生日会にもオススメです。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/JJ.jpg',
            ],
            [
                'name' => 'らーめん極み',
                'area_id' => 1,
                'genre_id' => 5,
                'description' => '一杯、一杯心を込めて職人が作っております。味付けは少し濃いめです。 食べやすく最後の一滴まで美味しく飲めると好評です。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E3%82%89%E3%83%BC%E3%82%81%E3%82%93%E6%A5%B5%E3%81%BF.jpg',
            ],
            [
                'name' => '鳥雨',
                'area_id' => 2,
                'genre_id' => 3,
                'description' => '素材の旨味を存分に引き出す為に、塩焼を中心としたお店です。比内地鶏を中心に、厳選素材を職人が備長炭で豪快に焼き上げます。清潔な内装に包まれた大人の隠れ家で贅沢で優雅な時間をお過ごし下さい。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E9%B3%A5%E9%9B%A8.jpg',
            ],
            [
                'name' => '築地色合',
                'area_id' => 1,
                'genre_id' => 1,
                'description' => '鮨好きの方の為の鮨屋として、迫力ある大きさの握りを1貫ずつ提供致します。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E7%AF%89%E5%9C%B0%E8%89%B2%E5%90%88.jpg',
            ],
            [
                'name' => '晴海',
                'area_id' => 2,
                'genre_id' => 2,
                'description' => '毎年チャンピオン牛を買い付け、仙台市長から表彰されるほどの上質な仕入れをする精肉店オーナーの本当に美味しい国産牛を食べてもらいたいという思いから誕生したお店です。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E6%99%B4%E6%B5%B7.jpg',
            ],
            [
                'name' => '三子',
                'area_id' => 3,
                'genre_id' => 2,
                'description' => '最高級の美味しいお肉で日々の疲れを軽減していただければと贅沢にサーロインを盛り込んだ御膳をご用意しております。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E4%B8%89%E5%AD%90.jpg',
            ],
            [
                'name' => '八戒',
                'area_id' => 1,
                'genre_id' => 3,
                'description' => '当店自慢の鍋や焼き鳥などお好きなだけ堪能できる食べ放題プランをご用意しております。飲み放題は2時間と3時間がございます。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E5%85%AB%E6%88%92.jpg',
            ],
            [
                'name' => '福助',
                'area_id' => 2,
                'genre_id' => 1,
                'description' => 'ミシュラン掲載店で磨いた、寿司職人の旨さへのこだわりはもちろん、 食事をゆっくりと楽しんでいただける空間作りも意識し続けております。 接待や大切なお食事にはぜひご利用ください。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E7%A6%8F%E5%8A%A9.jpg',
            ],
            [
                'name' => 'ラー北',
                'area_id' => 1,
                'genre_id' => 5,
                'description' => 'お昼にはランチを求められるサラリーマン、夕方から夜にかけては、学生や会社帰りのサラリーマン、小上がり席もありファミリー層にも大人気です。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E3%83%A9%E3%83%BC%E5%8C%97.jpg',
            ],
            [
                'name' => '翔',
                'area_id' => 2,
                'genre_id' => 3,
                'description' => '博多出身の店主自ら厳選した新鮮な旬の素材を使ったコース料理をご提供します。一人一人のお客様に目が届くようにしております。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E7%BF%94.jpg',
            ],
            [
                'name' => '経緯',
                'area_id' => 1,
                'genre_id' => 1,
                'description' => '職人が一つ一つ心を込めて丁寧に仕上げた、江戸前鮨ならではの味をお楽しみ頂けます。鮨に合った希少なお酒も数多くご用意しております。他にはない海鮮太巻き、当店自慢の蒸し鮑、是非ご賞味下さい。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E7%B5%8C%E7%B7%AF.jpg',
            ],
            [
                'name' => '漆',
                'area_id' => 1,
                'genre_id' => 2,
                'description' => '店内に一歩足を踏み入れると、肉の焼ける音と芳香が猛烈に食欲を掻き立ててくる。そんな漆で味わえるのは至極の焼き肉です。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E6%BC%86.jpg',
            ],
            [
                'name' => 'THE TOOL',
                'area_id' => 3,
                'genre_id' => 4,
                'description' => '非日常的な空間で日頃の疲れを癒し、ゆったりとした上質な時間を過ごせる大人の為のレストラン&バーです。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/THE+TOOL.jpg',
            ],
            [
                'name' => '木船',
                'area_id' => 2,
                'genre_id' => 1,
                'description' => '毎日店主自ら市場等に出向き、厳選した魚介類が、お鮨をはじめとした繊細な料理に仕立てられます。また、選りすぐりの種類豊富なドリンクもご用意しております。',
                'image_url' => 'https://restaurant-reservation-servicepractice--japan.s3.ap-northeast-1.amazonaws.com/%E6%9C%A8%E8%88%B9.jpg',
            ],
        ]);
    }
}
