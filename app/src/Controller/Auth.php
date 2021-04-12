<?php

    declare(strict_types=1);

    namespace App\Controller;

    class Auth
    {

        private ?string $valeSome;

        /**
         * Auth constructor.
         * @param  $valeSome
         */
        public function __construct($valeSome)
        {
            $this->valeSome = $valeSome;
        }

        /**
         * @return string
         */
        public function getValeSome(): string
        {
            return $this->valeSome;
        }

        /**
         * @param string $valeSome
         */
        public function setValeSome(string $valeSome): void
        {
            $this->valeSome = $valeSome;
        }
    }
