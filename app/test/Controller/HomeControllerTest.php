<?php

    namespace App\Test\Controller;

    use App\Controller\HomeController;
    use PHPUnit\Framework\TestCase;

    class HomeControllerTest extends TestCase
    {



        /**
         *Credsd
         */
        public function  testIfStatusesGoad()
        {

            $hw = new HomeController();
            $this->assertJson('{"core":123,"more":456,"mor":4545}');

        }


    }
