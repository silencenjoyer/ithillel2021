<?php

declare(strict_types=1);

class CyrillicRandomStringDecorator extends RandomStringDecorator
{
    public function __construct(RandomStringInterface $randomString)
    {
        parent::__construct($randomString);
    }

    public function getRandomString(int $length): string
    {
        $originString = $this->randomString->getRandomString($length);

        return $this->replaceCyrillic($originString);
    }

    private function replaceCyrillic(string $string): string
    {
        $change  = [
            'A' => 'А', 'c' => 'ц', 'f' => 'ф', 'I' => 'И', 'k' => 'к', 'N' => 'Н', 'p' => 'п', 'S' => 'С', 'u' => '', 'X' => 'Х', 'Z' => 'З', 'h' => 'х', 'r' => 'р',
            'B' => 'Б', 'd' => 'д', 'G' => 'Г', 'i' => 'и', 'L' => 'Л', 'n' => 'н', 'Q' => 'К', 's' => 'с', 'V' => '', 'x' => 'х', 'z' => 'з', 'K' => 'К', 'U' => 'У',
            'b' => 'б', 'E' => 'д', 'g' => 'г', 'J' => 'Ж', 'l' => 'л', 'O' => 'О', 'q' => 'к', 'T' => 'Т', 'v' => '', 'Y' => 'У', 'D' => 'д', 'm' => 'м', 'w' => 'в',
            'C' => 'Ц', 'e' => 'е', 'H' => 'Х', 'j' => 'ж', 'M' => 'М', 'o' => 'о', 'R' => 'Р', 't' => 'т', 'W' => '', 'y' => 'у', 'F' => 'Ф', 'P' => 'П',
        ];

        return strtr($string, $change);
    }
}
