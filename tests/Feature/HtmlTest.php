<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\TipCalculator;

class HtmlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /*
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertSeeText('Hola mundo');
        $response->assertStatus(200);
    }
    */

    /** @test  */
    public function checkComponent()
    {
        $response = $this->get('/')->assertSeeLivewire('tip-calculator');
    }

    /** @test  */
    public function checkComponentTags()
    {
        $response = Livewire::test(TipCalculator::class)->assertSeeHtml("<h1 class=\"title\">Calculadora de propinas</h1>");
    }
}
