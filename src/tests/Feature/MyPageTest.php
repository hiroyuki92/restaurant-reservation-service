<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Restaurant;
use App\Models\Reservation;

class MyPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->seed(\Database\Seeders\AreasTableSeeder::class);
        $this->seed(\Database\Seeders\GenresTableSeeder::class);
    }

    /**
     * @test
     * マイページ機能テスト
     * 予約が表示されるかテスト
     */
    public function can_view_my_page()
    {
        $area = Area::first();
        $genre = Genre::first();
        $restaurant = Restaurant::factory()->create([
            'area_id' => $area->id,
            'genre_id' => $genre->id,
        ]);
        $today = now();
        $reservationDate = $today->addDay()->toDateString();

        $reservationData = [
            'user_id' => $this->user->id,
            'restaurant_id' => $restaurant->id,
            'reservation_date' => $reservationDate,
            'time' => '19:00',
            'number_of_people' => 2,
        ];
        $response = $this->actingAs($this->user)->post(route('reservation'), $reservationData);

        $reservation = Reservation::with('restaurant')->where('user_id', $this->user->id)->first();
        $this->assertNotNull($reservation);

        $response = $this->actingAs($this->user)->get('/mypage');

        $response->assertStatus(200);
        $response->assertViewIs('mypage');
        $response->assertSee($reservation->restaurant->name);
        $response->assertSee($reservationDate);
        $response->assertSee('19:00');
        $response->assertSee('2人');
    }
    /**
     * @test
     * お気に入り店舗が全て表示されるかテスト
     */
    public function can_view_favorite_restaurants()
    {
        $restaurants = Restaurant::factory()->count(3)->create();
        foreach ($restaurants as $restaurant) {
            $this->user->favorites()->attach($restaurant->id);
        }

        $response = $this->actingAs($this->user)->get('/mypage');

        $response->assertStatus(200);
        $response->assertViewIs('mypage');
        foreach ($restaurants as $restaurant){
            $response->assertSee($restaurant->name);
            $response->assertSee($restaurant->area->name);
            $response->assertSee($restaurant->genre->name);
        }
    }
}
