<?php

    namespace App\Test;

    use App\HelloWorld;
    use PHPUnit\Framework\TestCase;


    class HelloWorldTest extends TestCase
    {

        /**
         * Test hello Controller
         */
        public function testAnno()
        {
            $hello = new HelloWorld();
            $asd = $hello->anno();

            /** @var TYPE_NAME $hello */
            $this->assertEquals('Hello',$asd);
        }
    }
