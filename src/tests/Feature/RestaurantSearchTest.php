<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Genre;

class RestaurantSearchTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\AreasTableSeeder::class);
        $this->seed(\Database\Seeders\GenresTableSeeder::class);
    }
    /**
     * @test
     * 検索機能テスト
     * エリアとジャンルで検索できるかテスト
     */
    public function can_search_restaurants_by_area_and_genre(){
        $area = Area::first();
        $genre = Genre::first();
        $restaurant1 = Restaurant::factory()->create([
            'area_id' => $area->id,
            'genre_id' => $genre->id,
        ]);
        // エリアは一致するがジャンルが異なるレストランを作成
        $restaurant2 = Restaurant::factory()->create([
            'area_id' => $area->id,
            'genre_id' => Genre::where('name', '!=', $genre->name)->first()->id,
        ]);
        // エリアは異なるがジャンルが一致するレストランを作成
        $restaurant3 = Restaurant::factory()->create([
            'area_id' => Area::where('name', '!=', $area->name)->first()->id,
            'genre_id' => $genre->id,
        ]);
        // 完全に一致しないエリアとジャンルのレストランを作成
        $restaurant4 = Restaurant::factory()->create([
            'area_id' => Area::where('name', '!=', $area->name)->first()->id,
            'genre_id' => Genre::where('name', '!=', $genre->name)->first()->id,
        ]);

        $response = $this->get('/search?area_id=' . $area->id . '&genre_id=' . $genre->id);
        $response->assertStatus(200);

        $response->assertSee($restaurant1->name);

        // 指定されたエリアとジャンルのレストラン以外が表示されないことを確認
        $response->assertDontSee($restaurant2->name);
        $response->assertDontSee($restaurant3->name);
        $response->assertDontSee($restaurant4->name);
    }

    /**
     * @test
     * 「飲食店名」で部分一致検索ができるかテスト
     */
    public function can_search_restaurants_by_keyword(){
        $restaurant1 = Restaurant::factory()->create([
            'name' => 'Test Restaurant 1',
        ]);
        $restaurant2 = Restaurant::factory()->create([
            'name' => 'Test Restaurant 2',
        ]);
        $restaurant3 = Restaurant::factory()->create([
            'name' => 'Another Restaurant',
        ]);

        $response = $this->get('/search?keyword=Test');
        $response->assertStatus(200);

        // 検索結果に含まれることを確認
        $response->assertSee($restaurant1->name);
        $response->assertSee($restaurant2->name);

        $response->assertDontSee($restaurant3->name);
    }
}
