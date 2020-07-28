<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\TipCalculator;

class TipCalculatorTest extends TestCase
{
    /** @test  */
    public function testCalculatorWorks()
    {
        $response = Livewire::test(TipCalculator::class)
            ->call('updated')
            ->set('amount', 10000)
            ->set('percentage', 10)
            ->assertSet('tip', 1000)
            ->assertSet('total', 11000);
    }

    /** @test  */
    public function testPropertiesAreNotString()
    {
        $response = Livewire::test(TipCalculator::class)
            ->call('updated')
            ->set('amount', 'diez mil')
            ->set('percentage', 'un diez porciento')
            ->assertHasErrors(['amount', 'percentage']);
    }

    /** @test  */
    public function testProperiesAreRequired()
    {
        $resposne = Livewire::test(TipCalculator::class)
            ->call('updated')
            ->set('amount', null)
            ->set('percentage', null)
            ->assertHasErrors(['amount', 'percentage']);
    }
}
