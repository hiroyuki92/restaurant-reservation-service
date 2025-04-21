<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Genre;

class ReservationTest extends TestCase
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
     * 予約機能テスト
     * 予約をすることができるかテスト
     */
    public function can_make_a_reservation()
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->actingAs($this->user)->get('/detail/' . $restaurant->id);

        $response->assertStatus(200);
        $response->assertViewIs('restaurant_detail');

        $today = now();
        $reservationDate = $today->addDay()->toDateString();

        $reservationData = [
            'user_id' => $this->user->id,
            'restaurant_id' => $restaurant->id,
            'reservation_date' => $reservationDate,
            'time' => '19:00',
            'number_of_people' => 2,
        ];
        $response = $this->post(route('reservation'), $reservationData);

        $reservationTime = $reservationDate . ' 19:00';

        $this->assertDatabaseHas('reservations', [
            'user_id' => $this->user->id,
            'restaurant_id' => $restaurant->id,
            'reservation_time' => $reservationTime,
            'number_of_people' => 2,
        ]);

        $response->assertRedirect(route('done'));
    }
    /**
     * @test
     * 予約日が今日より前の日付だとバリデーションメッセージが表示されるかテスト
     */
    public function cannot_reserve_past_date()
    {
        $restaurant = Restaurant::factory()->create();
        $response = $this->actingAs($this->user)->get('/detail/' . $restaurant->id);

        $response->assertStatus(200);
        $response->assertViewIs('restaurant_detail');

        $today = now();
        $reservationDate = $today->subDay()->toDateString();

        $reservationData = [
            'user_id' => $this->user->id,
            'restaurant_id' => $restaurant->id,
            'reservation_date' => $reservationDate,
            'time' => '19:00',
            'number_of_people' => 2,
        ];
        $response = $this->actingAs($this->user)->post(route('reservation'), $reservationData);
        $response->assertSessionHasErrors(['reservation_date' => '予約日は今日以降の日付を選択してください。']);

    }
}
