<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory {
	// $payment = App\Models\Payment::factory()->make(['order_id' => $order->id]);
	// $payment = App\Models\Payment::factory()->create(['order_id' => $order->id]);
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'amount' => $this->faker->randomFloat($maxDecimals = 2, $min = 15, $max = 500),
			'payed_at' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timeZone = null),
		];
	}
}
